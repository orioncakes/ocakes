<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;
use App\Models\Cake;
use App\Http\Resources\CakeResource;

class CakeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $cakes = CakeResource::collection(Cake::paginate(25));
        $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $cakes
        );
        return response()->json($data, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Storage::disk('public')->put('cake_image/'.$request->file('cake_image')->getClientOriginalName(),$request->file('cake_image')->get());
        $cake = Cake::create([
            'cake_name' => $request->cake_name,
            'cake_image' => 'cake_image/'.$request->file('cake_image')->getClientOriginalName(),
            'cake_description' => $request->cake_description,
            'cake_category_id' => $request->cake_category_id,
            'short_url' => $request->short_url,
            'is_available' => $request->is_available,
            'flavour_id' => $request->flavour_id,
            'like_counts' => $request->like_counts,
            'ratings' => $request->ratings,
            'is_veg' => $request->is_veg,
            'is_best_seller' => $request->is_best_seller,
            'created_by' =>  $request->user()->id,
            'ip_address' => request()->ip(),
            'is_best_seller' => $request->is_best_seller
          ]);
          $newly_created_cake = new CakeResource($cake);
          $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $newly_created_cake
          );
          return response()->json($data, 200);
    }

    public function show($id)
    {
        $cake = new CakeResource(Cake::find($id));
        
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $cake
        );
        return response()->json($data, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        new CakeResource(Cake::find($id)->update($request->all()));
        $cake = new CakeResource(Cake::find($id));
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $cake
        );
        return response()->json($data, 200); 
    }

    public function destroy($id)
    {
        new CakeResource(Cake::find($id)->delete());

        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" =>  "Successfully Deleted"
        );
        // return $data; 
      return response()->json($data, 204);
    }

    public function cake_filter(Request $request)
    {
      $data = array('status'=>false, 'status_code'=>999, 'data'=>'Init Failed');
      
      if($request->filter_type){
        
        $data = $this->getFilterBasedCake($request->filter_type);
        
      }else{
        $data = array('status'=>false, 'status_code'=>999, 'data'=>'No Filter Provided');
      }

      return response()->json($data, 200);
    
    }

   
    public function getFilterBasedCake($cat_id){
      
      $cakes = CakeResource::collection(Cake::whereCakeCategoryId($cat_id)->whereIsAvailable(1)->get());

      if(count( $cakes ) ==0 ){
        $cakes = CakeResource::collection(Cake::whereIsAvailable(1)->get());
      }
      $data = array(
        "status" => true,
        "status_code" => 1000,
        "data" => $cakes
      );
      
      return $data;

  }
}
