<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTableWithRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            
            if (!Schema::hasColumn('users', 'total_rating')) {
                Schema::table('users', function (Blueprint $table) {

                    $table->integer('total_rating')->default(0);
                });
            }

            if (!Schema::hasColumn('users', 'no_of_rating')) {
                Schema::table('users', function (Blueprint $table) {

                    $table->integer('no_of_rating')->default(0);
                });
            }

            if (!Schema::hasColumn('users', 'rating_average')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->float('rating_average')->default(0);
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
