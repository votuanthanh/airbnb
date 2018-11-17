<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->text('name');
            $table->integer('city_id')->index();
            $table->integer('amenity_id')->index();
            $table->text('discription')->nullable();
            $table->integer('number_rooms');
            $table->integer('number_bathrooms');
            $table->integer('price');
            $table->float('latitude', 8, 2)->nullable();
            $table->float('longtude', 8, 2)->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
