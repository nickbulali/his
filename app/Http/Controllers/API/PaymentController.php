<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Http\Resources\Payment as PaymentResource;
use App\Http\Resources\PaymentCollection;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $payments=Payment::all();
        return PaymentResource::collection($payments);
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
         $this->validate($request, [
            'amount' => 'required',
            'paid_by' => 'required',
            'invoice_id' => 'required',
            'status' => 'required'
        ]);

           $payment = new Payment();
            $payment->amount=$request->input('amount');
            $payment->paid_by =$request->input('paid_by');
            $payment->invoice_id =$request->input('invoice_id');
            $payment->status =$request->input('status');
              
           $payment->save();
           //return response()->json($payment);
            return new PaymentResource($payment);
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
         $payment=Payment::find($id);
   return new PaymentResource($payment);
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

         $this->validate($request, [
            'amount' => 'required',
            'paid_by' => 'required',
            'invoice_id' => 'required',
            'status' => 'required'
        ]);

            $payment=Payment::find($id);
            $payment->amount = $request->input('amount');
            $payment->paid_by = $request->input('paid_by');
            $payment->invoice_id = $request->input('invoice_id');
            $payment->status = $request->input('status');
                        
           $payment->save();
           //return response()->json($payment);
            return new PaymentResource($payment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
         $payment=Payment::find($id);
         $payment->delete();
   return new PaymentResource($payment);

    }
}
