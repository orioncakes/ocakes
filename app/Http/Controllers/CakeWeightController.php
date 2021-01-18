<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CakeWeight;
use App\Http\Resources\CakeWeightResource;

class CakeWeightController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $cake_weight = CakeWeightResource::collection(CakeWeight::paginate(25));
        $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $cake_weight
        );
        return response()->json($data, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cake_weight = CakeWeight::create([
            'cake_id' => $request->cake_id,
            'weight_id' => $request->weight_id,
            'supplier_id' => $request->supplier_id,
          ]);
          $newly_created_cake_weight = new CakeWeightResource($cake_weight);
          $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $newly_created_cake_weight
          );
          return response()->json($data, 200);
    }

    public function show($id)
    {
        $address_type = new CakeWeightResource(CakeWeight::find($id));
        
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $address_type
        );
        return response()->json($data, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        new CakeWeightResource(CakeWeight::find($id)->update($request->all()));
        $address_type = new CakeWeightResource(CakeWeight::find($id));
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $address_type
        );
        return response()->json($data, 200); 
    }

    public function destroy($id)
    {
        new CakeWeightResource(CakeWeight::find($id)->delete());

        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" =>  "Successfully Deleted"
        );
        // return $data; 
      return response()->json($data, 204);
    }
}
