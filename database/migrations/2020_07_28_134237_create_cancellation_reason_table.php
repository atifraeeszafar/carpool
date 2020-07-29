<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancellationReasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancellation_reasons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->longText('reason');
            $table->enum('payment_status', ['free', 'compensate']);
            $table->integer('is_user')->default(0)->comment('0 => driver, 1 => user ');
            $table->integer('is_active')->default(0);
            $table->unsignedInteger('created_by');
            $table->longText('extras')->nullable($value = true);
            
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
        Schema::dropIfExists('cancellation_reasons');
    }
}
