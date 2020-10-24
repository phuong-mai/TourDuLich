<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourGroup1TableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_group', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('tour_id')->nullable();
            $table->string('name')->nullable();
            $table->datetime('from_date')->nullable();
            $table->datetime('to_date')->nullable();
            $table->string('plan')->nullable();
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
        Schema::dropIfExists('tour_group');
    }
}
