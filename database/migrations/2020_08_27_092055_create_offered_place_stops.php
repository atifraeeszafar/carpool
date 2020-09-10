<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferedPlaceStops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offered_place_stops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ride_place_id');
            $table->string('pickup_address');
            $table->string('drop_address');
            $table->double('pickup_lat', 15, 8);
            $table->double('pickup_lng', 15, 8);
            $table->double('drop_lat', 15, 8);
            $table->double('drop_lng', 15, 8);
            $table->double('price', 15, 2)->default(0);
            $table->longText('coordinates')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('ride_place_id')
            ->references('id')
            ->on('offered_ride_places')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offered_place_stops');
    }
}
