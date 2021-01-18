<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class CakeResource extends JsonResource
{
    public $collects = MasterCategory::class;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'cake_name' => $this->cake_name,
            'cake_image' => $this->cake_image,
            'cake_description' => $this->cake_description,
            'cake_category_id' => $this->cake_category_id,
            'short_url' => $this->short_url,
            'is_available' => $this->is_available,
            'flavour_id' => $this->flavour_id,
            'like_counts' => $this->like_counts,
            'ratings' => $this->ratings,
            'is_veg' => $this->is_veg,
            'ip_address' => $this->ip_address,
            'created_by' => $this->created_by,
            'is_best_seller' => $this->is_best_seller
        ];
    }
}
