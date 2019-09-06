<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;
use App\Models\Payment;
use DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $payment = Payment::orderBy('number', 'asc')->get();
        return response()->json($payment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $counter = Counter::where('key', 'payment')->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'invoice_number' => 'required',
            'date' => 'required',
            'method' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'number' => 'required',
            'balance' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Payment = new Payment;
            $Payment->invoice_number = $request->input('invoice_number');
            $Payment->date = $request->input('date');
            $Payment->method = $request->input('method');
            $Payment->description = $request->input('description');
            $Payment->status = $request->input('status');
            $Payment->amount = $request->input('amount');
            $Payment->balance = $request->input('balance');
            $Payment->number = $request->input('number');
            try {
                $Payment->save();
                return response()->json($Payment);
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
        $payment = Payment::findOrFail($id);
        return response()->json($payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
          $rules = [
            'invoice_number' => 'required',
            'date' => 'required',
            'method' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'number' => 'required',
            'balance' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $payment = Payment::findOrFail($id);
            $payment->invoice_number = $request->input('invoice_number');
            $payment->date = $request->input('date');
            $payment->method = $request->input('method');
            $payment->description = $request->input('description');
            $payment->status = $request->input('status');
            $payment->amount = $request->input('amount');
            $payment->balance = $request->input('balance');
            $payment->number = $request->input('number');
            try {
                $payment->save();
                return response()->json($payment);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
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
           try {
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return response()->json($payment, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
