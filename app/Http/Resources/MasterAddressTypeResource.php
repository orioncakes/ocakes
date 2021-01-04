<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MasterAddressTypeResource extends JsonResource
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
            'address_type' => $this->address_type,
        ];
    }
}
