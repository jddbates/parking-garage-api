<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {

    return [
        'garage_id' => 1,
        'is_paid' => false,
        'created_at' => $faker->dateTimeBetween($startDate = '-9 hours', $endDate = 'now', $timezone = 'America/Toronto')
    ];
});


