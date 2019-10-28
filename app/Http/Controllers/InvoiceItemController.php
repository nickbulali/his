<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    //
       public function store(Request $request)
    {
        $rules = [
            'unit_price' => 'required',
            'qty' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $invoiceItem = new InvoiceItem;
            $invoiceItem->unit_price = $request->input('unit_price');
            $invoiceItem->qty = $request->input('qty');
            $invoiceItem->item_id = $request->input('item_id');
            $invoiceItem->invoice_id = $request->input('invoice_id');
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
        $invoiceItem = InvoiceItem::findOrFail($id);
        return response()->json($invoiceItem);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'unit_price' => 'required',
            'qty' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $invoiceItem = InvoiceItem::findOrFail($id);
            $invoiceItem->unit_price = $request->input('unit_price');
            $invoiceItem->qty = $request->input('qty');
            $invoiceItem->item_id = $request->input('item_id');
            $invoiceItem->invoice_id = $request->input('invoice_id');
            try {
                $invoiceItem->save();
                return response()->json($invoiceItem);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $invoiceItem = InvoiceItem::findOrFail($id);
            $invoiceItem->delete();
            return response()->json($invoiceItem, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
