<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride', function (Blueprint $table) {

            $table->uuid('id')->primary();
            $table->string('ride_id_string')->nullable();
            $table->unsignedInteger('rider_id');
            $table->dateTime('ride_date_time');
            $table->integer('no_of_passengers_left');
            $table->integer('trip_status');
            $table->longText('coordinates')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('ride');
    }
}
