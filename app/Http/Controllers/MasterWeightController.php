<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterWeight;
use App\Http\Resources\MasterWeightResource;

class MasterWeightController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $weights = MasterWeightResource::collection(MasterWeight::paginate(25));
        $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $weights
        );
        return response()->json($data, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $weight = MasterWeight::create([
            'kgs' => $request->kgs,
            'amount' => $request->amount,
          ]);
          $newly_created_weight = new MasterWeightResource($weight);
          $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $newly_created_weight
          );
          return response()->json($data, 200);
    }

    public function show($id)
    {
        $weight = new MasterWeightResource(MasterWeight::find($id));
        
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $weight
        );
        return response()->json($data, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        new MasterWeightResource(MasterWeight::find($id)->update($request->all()));
        $weight = new MasterWeightResource(MasterWeight::find($id));
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $weight
        );
        return response()->json($data, 200); 
    }

    public function destroy($id)
    {
        new MasterWeightResource(MasterWeight::find($id)->delete());

        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" =>  "Successfully Deleted"
        );
        // return $data; 
      return response()->json($data, 204);
    }
}
