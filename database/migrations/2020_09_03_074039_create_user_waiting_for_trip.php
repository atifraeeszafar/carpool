<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWaitingForTrip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('user_waiting_for_trip', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->dateTime('date');
            $table->time('start_time');
            $table->string('pickup_address');
            $table->string('drop_address');
            $table->double('pickup_lat', 15, 8);
            $table->double('pickup_lng', 15, 8);
            $table->double('drop_lat', 15, 8);
            $table->double('drop_lng', 15, 8);
            $table->timestamps();

            
            $table->foreign('user_id')
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
        Schema::dropIfExists('user_waiting_for_trip');
    }
}
