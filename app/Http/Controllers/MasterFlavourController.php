<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterFlavour;
use App\Http\Resources\MasterFlavourResource;

class MasterFlavourController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $flavours = MasterFlavourResource::collection(MasterFlavour::paginate(25));
        $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $flavours
        );
        return response()->json($data, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $flavour = MasterFlavour::create([
            'flavour_name' => $request->flavour_name,
          ]);
          $newly_created_flavour = new MasterFlavourResource($flavour);
          $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $newly_created_flavour
          );
          return response()->json($data, 200);
    }

    public function show($id)
    {
        $flavour = new MasterFlavourResource(MasterFlavour::find($id));
        
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $flavour
        );
        return response()->json($data, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        new MasterFlavourResource(MasterFlavour::find($id)->update($request->all()));
        $flavour = new MasterFlavourResource(MasterFlavour::find($id));
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $flavour
        );
        return response()->json($data, 200); 
    }

    public function destroy($id)
    {
        new MasterFlavourResource(MasterFlavour::find($id)->delete());

        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" =>  "Successfully Deleted"
        );
        // return $data; 
      return response()->json($data, 204);
    }
}
