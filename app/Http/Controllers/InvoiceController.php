<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Counter;
use DB;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $invoice = Invoice::with('patient.name')
            ->where('number', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
                ->paginate(15);
        } else {
            $invoice = Invoice::with(['patient.name'])
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        return response()->json($invoice);
    }

    public function countUsers($id)
    {
         return Invoice::where('id',$id)->count();
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
       $rules = [
            // 'patient_id' => 'required|integer|exists:patients,id',
            // 'date' => 'required|date_format:Y-m-d',
            // 'due_date' => 'required|date_format:Y-m-d',
            // 'description' => 'nullable|max:100',
            // 'discount' => 'required|numeric|min:0',
            // 'tax' => 'required|numeric|min:0',
            // 'status' => 'required',
            // 'total' => 'required',
            // 'sub_total' => 'required',
            // 'number' => 'required|unique',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $invoice = new Invoice;
            $invoice->number = $request->input('number');
            $invoice->patient_id = $request->input('patient_id');
            $invoice->date = $request->input('date');
            $invoice->due_date = $request->input('due_date');
            $invoice->description = $request->input('description');
            $invoice->discount = $request->input('discount');
            $invoice->tax = $request->input('tax');
            $invoice->status = $request->input('status');
            $invoice->total = $request->input('total');
            $invoice->sub_total = $request->input('sub_total');
            try {
                $invoice->save();
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            $invoiceItem = new invoiceItem;
            $invoiceItem->item_id = $request->input('item_id');
            $invoiceItem->invoice_id = $invoice->id;
            $invoiceItem->unit_price = $request->input('unit_price');
            $invoiceItem->qty = $request->input('qty');
            
            try {
                $invoiceItem->save();
                return response()->json($invoiceItem);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

      public function show($id)
    {
        $invoice = Invoice::with(['patient.name', 'items.item'])
            ->findOrFail($id);

        return response()
            ->json(['invoice' => $invoice]);
    }


    public function edit($id)
    {
        $form = Invoice::with(['patient', 'items.item'])
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
            'description' => 'nullable|max:100',
            'discount' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'status' => 'required',
            'items' => 'required|array|min:1',
            'items.*.id' => 'sometimes|required|integer|exists:invoice_items,id,invoice_id,'.$invoice->id,
            'items.*.item_id' => 'required|integer|exists:items,id',
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
