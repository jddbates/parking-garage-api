<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Ticket;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // gennerate uuid on ticket creation
        Ticket::creating(function ($ticket) {
            $ticket->uuid = (string) Str::uuid();
        });
    }
}
