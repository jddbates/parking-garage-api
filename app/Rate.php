<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * Get the garage that owns the rate.
     */
    public function garage()
    {
        return $this->belongsTo('App\Garage');
    }
}
