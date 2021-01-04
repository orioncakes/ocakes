<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Http\Resources\SellerResource;

class SellerController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index()
    {
        $sellers = SellerResource::collection(Seller::with('user')->paginate(25));
        $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $sellers
        );
        return response()->json($data, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $seller = Seller::create([
            'seller_name' => $request->seller_name,
            'seller_mobile_no' => $request->seller_mobile_no,
            'seller_shop_name' => $request->seller_shop_name,
            'seller_address' => $request->seller_address,
            'seller_city' => $request->seller_city,
            'seller_state' => $request->seller_state,
            'seller_pincode' => $request->seller_pincode,
            'seller_lat' => $request->seller_lat,
            'seller_long' => $request->seller_long,
            'is_active' => $request->is_active,
            'is_open' => $request->is_open,
            'user_id' =>  $request->user()->id,
            'ip_address' => $request->ip_address
          ]);
          $newly_created_seller = new SellerResource($seller);
          $data = array(
            "status" => true,
            "status_code" => 1000,
            "data" => $newly_created_seller
          );
          return response()->json($data, 200);
    }

    public function show($id)
    {
        $seller = new SellerResource(Seller::find($id));
        
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $seller
        );
        return response()->json($data, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        new SellerResource(Seller::find($id)->update($request->all()));
        $seller = new SellerResource(Seller::find($id));
        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" => $seller
        );
        return response()->json($data, 200); 
    }

    public function destroy($id)
    {
        new SellerResource(Seller::find($id)->delete());

        $data = array(
          "status" => true,
          "status_code" => 1000,
          "data" =>  "Successfully Deleted"
        );
        // return $data; 
      return response()->json($data, 204);
    }
}
