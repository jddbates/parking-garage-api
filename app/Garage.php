<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
