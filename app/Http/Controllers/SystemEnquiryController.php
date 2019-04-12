
<?php

namespace App\Http\Controllers;

use App\Models\SystemEnquiry;
use Illuminate\Http\Request;

class SystemEnquiryController extends Controller
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
             'occupation' => 'required',
             'residence' => 'required',
     


        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $SystemEnquiry = new SystemEnquiry;
            $SystemEnquiry->occupation = $request->input('occupation');
            $SystemEnquiry->residence = $request->input('residence');
           

            try {
                $SystemEnquiry->save();

                return response()->json($SystemEnquiry);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SystemEnquiry = SystemEnquiry::findOrFail($id);

        return response()->json($SystemEnquiry);
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
             'occupation' => 'required',
             'residence' => 'required',
     

        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $SystemEnquiry = SystemEnquiry::findOrFail($id);
            $SystemEnquiry->occupation = $request->input('occupation');
            $SystemEnquiry->residence = $request->input('residence');
           

            try {
                $SystemEnquiry->save();

                return response()->json($SystemEnquiry);
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
            $SystemEnquiry = SystemEnquiry::findOrFail($id);
            $SystemEnquiry->delete();

            return response()->json($SystemEnquiry, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
