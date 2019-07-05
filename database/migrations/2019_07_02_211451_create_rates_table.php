<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('garage_id')->unsigned();
            $table->integer('level');
            $table->string('title');
            $table->integer('lower_minutes');
            $table->integer('upper_minutes');
        });

        Schema::table('rates', function($table) {
            $table->foreign('garage_id')->references('id')->on('garages')->onDelete('cascade');
        });

        // Initialize rate records
        DB::table('rates')->insert(array(
            array(
                'garage_id' => 1,
                'level' => 0,
                'title' => '1h',
                'lower_minutes' => 0.5,
                'upper_minutes' => 0.5
            ),
            array(
                'garage_id' => 1,
                'level' => 1,
                'title' => '3h',
                'lower_minutes' => 0.5,
                'upper_minutes' => 0.5
            ),
            array(
                'garage_id' => 1,
                'level' => 2,
                'title' => '6hr',
                'lower_minutes' => 0.5,
                'upper_minutes' => 0.5
            ),
            array(
                'garage_id' => 1,
                'level' => 3,
                'title' => 'ALL DAY',
                'lower_minutes' => 0.5,
                'upper_minutes' => 0.5
            ),
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
