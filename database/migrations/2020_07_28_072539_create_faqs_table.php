<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->longText('question');
            $table->longText('answer');

            $table->unsignedInteger('created_by');
            $table->longText('extras')->nullable($value = true);
            $table->integer('is_active')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('created_by')
            ->references('id')
            ->on('users')
            ->constrained()
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
        Schema::dropIfExists('faqs');
    }
}
