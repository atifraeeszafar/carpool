<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rider_id');
            $table->unsignedInteger('preference_id');
            $table->unsignedInteger('answer_id');
            $table->timestamps();

            $table->foreign('preference_id')
                    ->references('id')
                    ->on('preferences')
                    ->onDelete('cascade');


            $table->foreign('answer_id')
                    ->references('id')
                    ->on('preferences_answers')
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
        Schema::dropIfExists('rider_preferences');
    }
}
