<?php
namespace App\Http\Controllers;
use App\Models\Queue;
use Illuminate\Http\Request;
class QueueController extends Controller
{
    public function index()
    {
        $queue = Queue::with('patient.name')->with('patient.gender')->with('patient.maritalStatus')->with('queueStatus')->orderBy('created_at', 'DESC')->get();
        return response()->json($queue);
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
            'id' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $queue = new Queue;
            $queue->patient_id = $request->input('id');
            try {
                $queue->save();
                return response()->json($queue);
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
        $queue = Queue::findOrFail($id);
        return response()->json($queue);
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
            'name' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $queue = Queue::findOrFail($id);
            $queue->name = $request->input('name');
            $queue->display_name = $request->input('display_name');
            $queue->description = $request->input('description');
            try {
                $queue->save();
                return response()->json($queue);
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
            return response()->json(Queue::destroy($id), 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
