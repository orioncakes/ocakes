<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MasterCategory;
use App\Http\Resources\MasterCategories as MasterCategoryResource;

class MasterCategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    { 
      $categories = MasterCategoryResource::collection(MasterCategory::paginate(25));
      $data = array(
        "status" => true,
        "status_code" => 1000,
        "data" => $categories
      );
      return response()->json($data, 200);
    }

    public function store(Request $request)
    {
      $cateogry = MasterCategory::create([
        'category_name' => $request->category_name,
      ]);
      $newly_created_cateogry = new MasterCategoryResource($cateogry);
      $data = array(
        "status" => true,
        "status_code" => 1000,
        "data" => $newly_created_cateogry
      );
      return response()->json($data, 200);
    }

    public function show($id)
      {
        $category = new MasterCategoryResource(MasterCategory::find($id));
        
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $category
        );
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        new MasterCategoryResource(MasterCategory::find($id)->update($request->all()));
        $category = new MasterCategoryResource( new MasterCategoryResource(MasterCategory::find($id)));
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $category
        );
        return response()->json($data, 200); 
    }

    public function destroy( $masterCategory)
    {
        new MasterCategoryResource(MasterCategory::find($masterCategory)->delete());

        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" =>  "Successfully Deleted"
        );
        // return $data; 
      return response()->json($data, 204);
    }
}
