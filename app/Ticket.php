<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * Get the garage that owns the ticket.
     */
    public function garage()
    {
        return $this->belongsTo('App\Garage');
    }
}
