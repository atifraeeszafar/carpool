<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNeededDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_needed_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('doc_type');
            $table->boolean('for_driver')->default(false);
            $table->boolean('has_identify_number')->default(false);
            $table->string('identify_number_locale_key')->nullable();
            $table->boolean('has_expiry_date')->default(false);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('user_needed_documents');
    }
}
