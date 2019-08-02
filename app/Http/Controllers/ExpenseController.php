<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use Carbon\Carbon;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $Expense = Expenses::with('ExpenseCategory')->where('description', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $Expense = Expenses::with('ExpenseCategory')->orderBy('created_at', 'ASC')->paginate(10);
        }

        return response()->json($Expense);
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
            'category' => 'required',
            'expense_code' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Expense = new Expenses;
            $Expense->expense_category_id = $request->category;
            $Expense->expense_code = $request->expense_code;
            $Expense->description = $request->description;
            $Expense->unit_price = $request->unit_price;

            try {
                $Expense->save();

                return response()->json($Expense);
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
        $Expense = Expenses::findOrFail($id);

        return response()->json($Expense);
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
            'category' => 'required',
            'expense_code' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Expense = Expense::findOrFail($id);
            $Expense->expense_category_id = $request->category;
            $Expense->expense_code = $request->expense_code;
            $Expense->description = $request->description;
            $Expense->unit_price = $request->unit_price;

            try {
                $Expense->save();

                return response()->json($Expense);
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
            $Expense = Expense::findOrFail($id);
            $Expense->delete();

            return response()->json($Expense, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
