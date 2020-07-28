<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('preference_id');
            $table->string('answer');
            $table->timestamps();

            $table->foreign('preference_id')
                    ->references('id')
                    ->on('preferences')
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
        Schema::dropIfExists('preferences_answers');
    }
}
