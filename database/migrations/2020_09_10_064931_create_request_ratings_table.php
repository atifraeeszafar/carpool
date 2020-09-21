<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('request_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('offered_ride_place_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('rider_id');
            $table->float('rating')->default(0);
            $table->string('comment')->nullable();
            $table->boolean('user_rating')->default(false);
            $table->boolean('rider_rating')->default(false);
            $table->timestamps();

            $table->foreign('offered_ride_place_id')
                    ->references('id')
                    ->on('offered_ride_places')
                    ->onDelete('cascade');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('rider_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('request_ratings');
    }
}
