<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Counter;
use DB;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $invoice = Invoice::with('patient.name')->where('number', 'LIKE', "%{$search}%")
                ->paginate(15);
        } else {
            $invoice = Invoice::with(['patient.name'])
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        return response()->json($invoice);
    }

    public function create()
    {
        $counter = Counter::where('key', 'invoice')->first();

        $form = [
            'number' => $counter->prefix . $counter->value,
            'patient_id' => null,
            'patient' => null,
            'date' => date('Y-m-d'),
            'due_date' => null,
            'reference' => null,
            'discount' => 0,
            'terms_and_conditions' => 'Default Terms',
            'items' => [
                [
                    'item_id' => null,
                    'item' => null,
                    'unit_price' => 0,
                    'qty' => 1
                ]
            ]
        ];

        return response()
            ->json(['form' => $form]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer|exists:patients,id',
            'date' => 'required|date_format:Y-m-d',
            'due_date' => 'required|date_format:Y-m-d',
            'reference' => 'nullable|max:100',
            'discount' => 'required|numeric|min:0',
            'terms_and_conditions' => 'required|max:2000',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.qty' => 'required|integer|min:1'
        ]);

        $invoice = new Invoice;
        $invoice->fill($request->except('items'));

        $invoice->sub_total = collect($request->items)->sum(function($item) {
            return $item['qty'] * $item['unit_price'];
        });

        $invoice = DB::transaction(function() use ($invoice, $request) {
            $counter = Counter::where('key', 'invoice')->first();
            $invoice->number = $counter->prefix . $counter->value;

            // custom method from app/Helper/HasManyRelation
            $invoice->storeHasMany([
                'items' => $request->items
            ]);

            $counter->increment('value');

            return $invoice;
        });

        return response()
            ->json(['saved' => true, 'id' => $invoice->id]);
    }

      public function show($id)
    {
        $invoice = Invoice::with(['patient.name', 'items'])
            ->findOrFail($id);

        return response()
            ->json(['invoice' => $invoice]);
    }


    public function edit($id)
    {
        $form = Invoice::with(['patient', 'items.product'])
            ->findOrFail($id);

        return response()
            ->json(['form' => $form]);
    }

    public function update($id, Request $request)
    {
        $invoice = Invoice::findOrFail($id);

        $request->validate([
            'patient_id' => 'required|integer|exists:patients,id',
            'date' => 'required|date_format:Y-m-d',
            'due_date' => 'required|date_format:Y-m-d',
            'reference' => 'nullable|max:100',
            'discount' => 'required|numeric|min:0',
            'terms_and_conditions' => 'required|max:2000',
            'items' => 'required|array|min:1',
            'items.*.id' => 'sometimes|required|integer|exists:invoice_items,id,invoice_id,'.$invoice->id,
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.qty' => 'required|integer|min:1'
        ]);

        $invoice->fill($request->except('items'));

        $invoice->sub_total = collect($request->items)->sum(function($item) {
            return $item['qty'] * $item['unit_price'];
        });

        $invoice = DB::transaction(function() use ($invoice, $request) {
            // custom method from app/Helper/HasManyRelation
            $invoice->updateHasMany([
                'items' => $request->items
            ]);

            return $invoice;
        });

        return response()
            ->json(['saved' => true, 'id' => $invoice->id]);
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->items()->delete();

        $invoice->delete();

        return response()
            ->json(['deleted' => true]);
    }
}
