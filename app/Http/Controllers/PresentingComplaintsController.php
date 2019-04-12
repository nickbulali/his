
<?php

namespace App\Http\Controllers;

use App\Models\PresentingComplaints;
use Illuminate\Http\Request;

class PresentingComplaintsController extends Controller
{
    public function index(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
             'comment' => 'required',
     


        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $PresentingComplaints = new PresentingComplaints;
            $PresentingComplaints->comment = $request->input('comment');
           

            try {
                $PresentingComplaints->save();

                return response()->json($PresentingComplaints);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    /**
     * comment the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PresentingComplaints = PresentingComplaints::findOrFail($id);

        return response()->json($PresentingComplaints);
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
             'comment' => 'required',
     

        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $PresentingComplaints = PresentingComplaints::findOrFail($id);
            $PresentingComplaints->comment = $request->input('comment');
           

            try {
                $PresentingComplaints->save();

                return response()->json($PresentingComplaints);
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
            $PresentingComplaints = PresentingComplaints::findOrFail($id);
            $PresentingComplaints->delete();

            return response()->json($PresentingComplaints, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
