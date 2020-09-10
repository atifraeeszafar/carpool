<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOfferedRideCustomerRequestsWithExtraParam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('offered_ride_customer_requests')) {

            if (!Schema::hasColumn('offered_ride_customer_requests', 'status')) {
                Schema::table('offered_ride_customer_requests', function (Blueprint $table) {
                    $table->integer('status')->default(0);
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
