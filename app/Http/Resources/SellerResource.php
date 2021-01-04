<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
{
    // public $collects = MasterFlavour::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        return [
            'id' => $this->id,
            'seller_name' => $this->seller_name,
            'seller_mobile_no' => $this->seller_mobile_no,
            'seller_shop_name' => $this->seller_shop_name,
            'seller_address' => $this->seller_address,
            'seller_city' => $this->seller_city,
            'seller_state' => $this->seller_state,
            'seller_pincode' => $this->seller_pincode,
            'seller_lat' => $this->seller_lat,
            'seller_long' => $this->seller_long,
            'is_active' => $this->is_active,
            'is_open' => $this->is_open,
            'user_id' => $this->user_id,
            'user'=> $this->user
        ];
    }
}
