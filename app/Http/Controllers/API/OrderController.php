<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Http\Resources\Order as OrderResource;
use App\Http\Resources\OrderCollection;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $orders=Order::all();
        return OrderResource::collection($orders);
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
            'invoice_id' => 'required|exists:invoices,id',
            'charge_sheet_id' => 'required|numeric|min:1',
            'status' => 'required',
            'requested_by' => 'required|max:255'
        ]);

           $order = new Order();
            $order->invoice_id=$request->input('invoice_id');
            $order->charge_sheet_id =$request->input('charge_sheet_id');
            $order->status =$request->input('status');
            $order->requested_by =$request->input('requested_by');

           $order->save();
           //return response()->json($order);
            return new OrderResource($order);
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
        $order=Order::find($id);
   return new OrderResource($order);
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
            'invoice_id' => 'required|exists:invoices,id',
            'charge_sheet_id' => 'required|numeric|min:1',
            'status' => 'required',
            'requested_by' => 'required|max:255'
        ]);

            $order=Order::find($id);
            $order->invoice_id=$request->input('invoice_id');
            $order->charge_sheet_id =$request->input('charge_sheet_id');
            $order->status =$request->input('status');
            $order->requested_by =$request->input('requested_by');
                         
           $order->save();
          // return response()->json($order);
             return new OrderResource($order);
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
          $order=Order::find($id);
         $order->delete();
   return new OrderResource($order);
    }
}
