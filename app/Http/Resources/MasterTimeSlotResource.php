<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MasterTimeSlotResource extends JsonResource
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
            'time_slot' => $this->time_slot,
            'is_available' => $this->is_available,
        ];
    }
}
