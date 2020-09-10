<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArrivedStatueCancelReason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cancellation_reasons', function (Blueprint $table) {
            //
            //$table->integer('arrived_state')->default(0)->comment('1' => 'before', 2 => 'after');
            $table->integer('arrived_state')->default(1)->comment('1 => before arrived, 2 => after arrived ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cancellation_reasons', function (Blueprint $table) {
            //
        });
    }
}
