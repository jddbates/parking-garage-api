<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rate;
use App\Garage;
use Carbon\Carbon;

class Ticket extends Model
{
    /**
     * Get the garage that owns the ticket.
     */
    public function garage()
    {
        return $this->belongsTo('App\Garage');
    }

    public function minutes_elapsed()
    {
        return Carbon::now()->diffInMinutes($this->created_at);
    }

    public function hours_elapsed()
    {
        $hours_elapsed = $this->minutes_elapsed() / 60;
        return number_format($hours_elapsed, 2);
    }

    public function calculate_price()
    {
        $garage = Garage::first();
        $rate = $this->get_rate($this->minutes_elapsed());
        // price * (1 + percentage / 100)^n
        $price = ($garage->base_rate * pow(1 + $garage->rate_multiplier, $rate->level)) / 100;
        return number_format($price, 2);
    }

    public function get_rate($minutes_elapsed)
    {
        return Rate::where('lower_minutes', '<=', $minutes_elapsed)->where('upper_minutes', '>=', $minutes_elapsed)->first();
    }
}
