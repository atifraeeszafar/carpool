<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferedRidePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offered_ride_places', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rider_id');
            $table->string('pickup_address');
            $table->string('drop_address');
            $table->double('pickup_lat', 15, 8);
            $table->double('pickup_lng', 15, 8);
            $table->double('drop_lat', 15, 8);
            $table->double('drop_lng', 15, 8);
            $table->time('start_time')->nullable();
            $table->integer('no_of_seats')->default(0);
            $table->integer('no_of_seats_occupied')->default(0);
            $table->boolean('is_frequent_ride')->default(false);
            $table->timestamp('date')->nullable();
            $table->lineString('coordinates')->nullable();
            $table->boolean('is_cancelled_by_rider')->default(0);
            $table->timestamp('cancelled_at')->nullable();

            $table->foreign('rider_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

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
        Schema::dropIfExists('offered_ride_places');
    }
}
