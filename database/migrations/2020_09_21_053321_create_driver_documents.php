<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_documents', function (Blueprint $table) {
        //     $table->increments('id');
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('document_id');
            $table->string('image');
            $table->longText('extra_fields');
            $table->integer('document_status')->default(2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            // $table->foreign('document_id')
            //         ->references('id')
            //         ->on('taxi_driver_needed_documents')
            //         ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_documents');
    }
}
