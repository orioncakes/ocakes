<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterTimeSlot;
use App\Http\Resources\MasterTimeSlotResource;

class MasterTimeSlotController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $time_slots = MasterTimeSlotResource::collection(MasterTimeSlot::paginate(25));
        $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $time_slots
        );
        return response()->json($data, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $time_slot = MasterTimeSlot::create([
            'time_slot' => $request->time_slot,
            'is_available' => $request->is_available,
          ]);
          $newly_created_time_slot = new MasterTimeSlotResource($time_slot);
          $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $newly_created_time_slot
          );
          return response()->json($data, 200);
    }

    public function show($id)
    {
        $time_slot = new MasterTimeSlotResource(MasterTimeSlot::find($id));
        
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $time_slot
        );
        return response()->json($data, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        new MasterTimeSlotResource(MasterTimeSlot::find($id)->update($request->all()));
        $time_slot = new MasterTimeSlotResource(MasterTimeSlot::find($id));
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $time_slot
        );
        return response()->json($data, 200); 
    }

    public function destroy($id)
    {
        new MasterTimeSlotResource(MasterTimeSlot::find($id)->delete());

        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" =>  "Successfully Deleted"
        );
        // return $data; 
      return response()->json($data, 204);
    }
}
