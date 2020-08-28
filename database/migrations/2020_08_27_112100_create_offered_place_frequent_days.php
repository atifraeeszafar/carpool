<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferedPlaceFrequentDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offered_place_frequent_days', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ride_place_id');
            $table->string('available_days');
            $table->timestamp('to_be_cancelled_at')->nullable();
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
        Schema::dropIfExists('offered_place_frequent_days');
    }
}
