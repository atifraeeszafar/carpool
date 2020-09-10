<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UdateOfferedRidePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('offered_ride_places')) {
            if (!Schema::hasColumn('offered_ride_places', 'is_cancelled_by_rider')) {
                Schema::table('offered_ride_places', function (Blueprint $table) {
                    $table->boolean('is_cancelled_by_rider')->after('coordinates')->default(0);
                });
            }
            if (!Schema::hasColumn('offered_ride_places', 'cancelled_at')) {
                Schema::table('offered_ride_places', function (Blueprint $table) {
                    $table->timestamp('cancelled_at')->after('is_cancelled_by_rider')->nullable();
                });
            }
        }
        if (Schema::hasTable('offered_ride_customer_requests')) {
            if (!Schema::hasColumn('offered_ride_customer_requests', 'cancelled_at')) {
                Schema::table('offered_ride_customer_requests', function (Blueprint $table) {
                    $table->timestamp('cancelled_at')->after('is_cancelled_by_user')->nullable();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
