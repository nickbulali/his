<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChargeSheet;
use App\Http\Resources\ChargeSheet as ChargeSheetResource;
use App\Http\Resources\ChargeSheetCollection;
class ChargeSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $chargeSheets=ChargeSheet::all();
        return ChargeSheetResource::collection($chargeSheets);
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
            'test_type_id' => 'required|numeric|min:1',
            'cost' => 'required|numeric|min:1',
            'covered_by' => 'required|max:255'
        ]);
       $chargeSheet = new ChargeSheet();
       $chargeSheet->test_type_id = $request->input('test_type_id');
       $chargeSheet->cost = $request->input('cost');
       $chargeSheet->covered_by = $request->input('covered_by');
               
           $chargeSheet->save();
         //  return response()->json($chargeSheet);
            return new ChargeSheetResource($chargeSheet);
    }
    public function show($id)
    {
        
   $chargeSheet=ChargeSheet::find($id);
   return new ChargeSheetResource($chargeSheet);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
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
            'test_type_id' => 'required|numeric|min:1',
            'cost' => 'required|numeric|min:1',
            'covered_by' => 'required|max:255'
        ]);
            $chargeSheet=ChargeSheet::find($id);
            $chargeSheet->test_type_id=$request->input('test_type_id');
            $chargeSheet->cost =$request->input('cost');
            $chargeSheet->covered_by =$request->input('covered_by');
                        
           $chargeSheet->save();
          // return response()->json($chargeSheet);
         return new ChargeSheetResource($chargeSheet);
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
          $chargeSheet=ChargeSheet::find($id);
         $chargeSheet->delete();
   return new ChargeSheetResource($chargeSheet);
    }
}
