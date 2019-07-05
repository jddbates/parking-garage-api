<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;

class Garage extends Model
{
    /**
     * Get the tickets for the garage.
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    /**
     * Get the rates for the garage.
     */
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }

    /**
     * Get the number of parking spots available for the garage.
     */
    public function spots_available()
    {
        return $this->parking_spots - Ticket::where('is_paid', 0)->count();
    }

}
