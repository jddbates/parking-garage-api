<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('garage_id')->unsigned()->default(1);;
            $table->uuid('uuid');
            $table->tinyInteger('is_paid')->default(0);
            $table->timestamps();
        });

        Schema::table('tickets', function($table) {
            $table->foreign('garage_id')->references('id')->on('garages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
