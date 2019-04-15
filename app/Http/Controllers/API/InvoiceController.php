<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoice;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Invoice as InvoiceResource;
use App\Http\Resources\InvoiceCollection;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get list of invoices ordered by date of creation
        $invoices=Invoice::all();
        return InvoiceResource::collection($invoices);
        //get list of invoices
        //$invoices = Invoice::paginate(10);
        //return list of invoices as a resource
        //return InvoiceResource::collection($invoices);
    
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(Request $request)
    {
         $this->validate($request, [
            'invoice_no' => 'required|alpha_dash|unique:invoices',
            'encounter_id' => 'required|numeric|min:1',
            'opened_by' => 'required|max:255',
            'status' => 'required',
            'total' => 'required'
        ]);
            $invoice=new Invoice();
            $invoice->invoice_no=$request->input('invoice_no');
            $invoice->encounter_id =$request->input('encounter_id');
            $invoice->opened_by =$request->input('opened_by');
            $invoice->status=$request->input('status');
            $invoice->total =$request->input('total');
              
           $invoice->save();
           //return response()->json($invoice);
            return new InvoiceResource($invoice);
          }
/*public function edit(Invoice $invoice)
{
    $invoice=Invoice::find($invoice->id);
    return view('invoices.edit', ['invoice'=>$invoice]);
}
  */ 
   public function show($id)
  {
   $invoice=Invoice::find($id);
   return new InvoiceResource($invoice);
  }
       public function update(Request $request, $id)
    {
        //
         $this->validate($request, [
            'invoice_no' => 'required|alpha_dash|unique:invoices',
            'encounter_id' => 'required|numeric|min:1',
            'opened_by' => 'required|max:255',
            'status' => 'required',
            'total' => 'required'
        ]);
            $invoice=Invoice::find($id);
            $invoice->invoice_no=$request->input('invoice_no');
            $invoice->encounter_id =$request->input('encounter_id');
            $invoice->opened_by =$request->input('opened_by');
            $invoice->status=$request->input('status');
            $invoice->total =$request->input('total');
              
           $invoice->save();
           //return response()->json($invoice);
            return new InvoiceResource($invoice);
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
         $invoice=Invoice::find($id);
         $invoice->delete();
   return new InvoiceResource($invoice);
    }
}
