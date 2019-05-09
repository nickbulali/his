<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Invoice;
use App\Models\Counter;
use DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
      $payment = Payment::orderBy('id', 'ASC')->paginate(10);
        return response()->json($payment);

    }

    public function search(Request $request)
    {
        //
         if ($request->query('search')) {
            $search = $request->query('search');
            $invoice = Invoice::with('invoice.number')->where('number', 'LIKE', "%{$search}%")
                ->paginate(15);
        } else {
            $invoice = Invoice::with(['invoice.number'])
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        return response()->json($invoice);
    }

public function create()
{
     $counter = Counter::where('key', 'payment')->first();

        $form = [

            'number' => $counter->prefix . $counter->value
];
        return response()
            ->json(['form' => $form]);
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = [
            
          
        
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $payment = new Payment;
            $payment->invoice_id = $request->input('invoice_id');
            $payment->number = $request->input('number');
            $payment->date = $request->input('date');
            $payment->amount = $request->input('amount');
            $payment->balance = $request->input('balance');
            $payment->method = $request->input('method');
            $payment->description = $request->input('description');
            $payment = DB::transaction(function() use ($payment, $request) {
            $counter = Counter::where('key', 'payment')->first();
            $payment->number = $counter->prefix . $counter->value;
            $counter->increment('value');

            return $payment;

              });

            try {
                $payment->save();
                return response()->json($payment->loader(), 200);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
          $payment = Payment::whereId($id)->with('invoice.patient.name')->get();
        return response()->json($payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
