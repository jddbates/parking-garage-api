<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ticket extends JsonResource
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
            'id' => $this->id,
            'uuid' => $this->uuid,
            'is_paid' => $this->is_paid,
            'created_at' => $this->created_at,
            'minutes_elapsed' => $this->minutes_elapsed(),
            'hours_elapsed' => $this->hours_elapsed(),
            'price' => '$'.$this->calculate_price()
        ];
    }
}
