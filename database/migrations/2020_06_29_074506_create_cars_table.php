<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number_plate');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('car_make');
            $table->unsignedInteger('car_model');
            $table->unsignedInteger('vehicle_type');
            $table->unsignedInteger('car_color');
            $table->string('model_year');
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('car_make')
                    ->references('id')
                    ->on('car_makes')
                    ->onDelete('cascade');

            $table->foreign('car_model')
                    ->references('id')
                    ->on('car_models')
                    ->onDelete('cascade');

            $table->foreign('car_color')
                    ->references('id')
                    ->on('car_colors')
                    ->onDelete('cascade');

            $table->foreign('vehicle_type')
                    ->references('id')
                    ->on('vehicle_types')
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
        Schema::dropIfExists('cars');
    }
}
