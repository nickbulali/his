<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Invoice;
use App\Models\Counter;
use DB;
use App\Http\Controllers\Controller;

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

    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $payment = Payment::with('invoice')
            ->where('number', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
                ->paginate(15);
        } else {
            $payment = Payment::with(['invoice'])
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

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

              $form = [
            'number' => $counter->prefix . $counter->value,
            'invoice_id' => null,
            'date' => null,
            'status' => null,
            'method' => null,
            'amount' => null,
            'balance' => null,
            'description' => null
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
         $request->validate([
            'invoice_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'method' => 'required',
            'status' => 'required',
            'amount' => 'required|numeric|min:0',
            'number' => 'required',
            'balance' => 'required|numeric|min:0'
        ]);

        $payment = new Payment;
        $payment->fill([ $payment->invoice_id = $request->input('invoice_id'),
            $payment->date = $request->input('date'),
            $payment->method = $request->input('method'),
            $payment->description = $request->input('description'),
            $payment->status = $request->input('status'),
            $payment->amount = $request->input('amount'),
            $payment->balance = $request->input('balance'),
            $payment->number = $request->input('number') ])->save();

       

        $payment = DB::transaction(function() use ($payment, $request) {
            $counter = Counter::where('key', 'payment')->first();
            $payment->number = $counter->prefix . $counter->value;
          

            $counter->increment('value');

            return $payment;
        });

        return response()
            ->json(['saved' => true, 'id' => $payment->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $rules = [
            'invoice_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'method' => 'required',
            'status' => 'required',
            'amount' => 'required|numeric|min:0',
            'number' => 'required',
            'balance' => 'required|numeric|min:0'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $payment = Payment::findOrFail($id);
            $payment->invoice_id = $request->input('invoice_id');
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
           try {
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return response()->json($payment, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
