<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_cost', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('cost_hotel');
            $table->integer('cost_food');
            $table->integer('cost_vehicle');
            $table->integer('cost_another');
            $table->string('description');
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
        Schema::dropIfExists('tour_cost');
    }
}
