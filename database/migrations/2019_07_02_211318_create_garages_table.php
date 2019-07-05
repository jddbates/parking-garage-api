<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parking_spots');
            $table->integer('base_rate');
            $table->float('rate_multiplier');
        });


        // Initialize garage record
        DB::table('garages')->insert(
            [
                'id' => 1,
                'parking_spots' => 12,
                'base_rate' => 300,
                'rate_multiplier' => 0.5
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('garages');
    }
}
