<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterAddressType;
use App\Http\Resources\MasterAddressTypeResource;

class MasterAddressTypeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $address_type = MasterAddressTypeResource::collection(MasterAddressType::paginate(25));
        $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $address_type
        );
        return response()->json($data, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $address_type = MasterAddressType::create([
            'address_type' => $request->address_type,
          ]);
          $newly_created_address_type = new MasterAddressTypeResource($address_type);
          $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $newly_created_address_type
          );
          return response()->json($data, 200);
    }

    public function show($id)
    {
        $address_type = new MasterAddressTypeResource(MasterAddressType::find($id));
        
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
        new MasterAddressTypeResource(MasterAddressType::find($id)->update($request->all()));
        $address_type = new MasterAddressTypeResource(MasterAddressType::find($id));
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $address_type
        );
        return response()->json($data, 200); 
    }

    public function destroy($id)
    {
        new MasterAddressTypeResource(MasterAddressType::find($id)->delete());

        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" =>  "Successfully Deleted"
        );
        // return $data; 
      return response()->json($data, 204);
    }
}
