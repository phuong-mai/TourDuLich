<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_price', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('id_tour')->nullable();
            $table->dateTime('start_day')->nullable();
            $table->dateTime('end_day')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_price');
    }
}
