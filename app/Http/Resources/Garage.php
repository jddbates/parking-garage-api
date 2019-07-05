<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Garage extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'parking_spots' => $this->parking_spots,
            'base_rate' => $this->base_rate,
            'rate_multiplier' => $this->rate_multiplier,
            'spots_available' => $this->spots_available()
        ];
    }
}
