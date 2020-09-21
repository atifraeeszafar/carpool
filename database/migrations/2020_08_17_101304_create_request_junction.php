<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestJunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_junction', function (Blueprint $table) {
          
            $table->bigIncrements('id');
            $table->uuid('ride_id');
            $table->string('pick_up_location')->nullable();
            $table->string('pick_up_lat')->nullable();
            $table->string('pick_up_lng')->nullable();
            $table->string('drop_location')->nullable();
            $table->string('drop_location_lat')->nullable();
            $table->string('drop_location_lng')->nullable();
            $table->integer('order');
            $table->double('price',15,2)->default(0);
            $table->longText('coordinates')->nullable();
            $table->integer('status');
            $table->timestamps();

            $table->foreign('ride_id')
            ->references('id')
            ->on('ride')
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
        Schema::dropIfExists('ride_junction');
    }
}
