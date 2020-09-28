<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDocumentImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_document_image', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_document_id');
            $table->string('image');
            $table->timestamps();

            $table->foreign('user_document_id')
                    ->references('id')
                    ->on('user_documents')
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
        Schema::dropIfExists('user_document_image');
    }
}
