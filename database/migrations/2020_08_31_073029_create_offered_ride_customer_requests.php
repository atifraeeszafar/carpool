<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferedRideCustomerRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offered_ride_customer_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ride_place_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('offered_place_stops_id');
            $table->integer('no_of_seats_requested')->default(0);
            $table->string('pickup_address');
            $table->string('drop_address');
            $table->double('pickup_lat', 15, 8);
            $table->double('pickup_lng', 15, 8);
            $table->double('drop_lat', 15, 8);
            $table->double('drop_lng', 15, 8);
            $table->boolean('is_accepted')->default(0);
            $table->boolean('is_rejected')->default(0);
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('requested_date')->nullable();
            $table->time('requested_time')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->boolean('is_cancelled_by_user')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('ride_place_id')
            ->references('id')
            ->on('offered_ride_places')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('offered_place_stops_id')
            ->references('id')
            ->on('offered_place_stops')
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
        Schema::dropIfExists('offered_ride_customer_requests');
    }
}
