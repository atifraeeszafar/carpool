<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserWithGenderBasedSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            
            if (!Schema::hasColumn('users', 'gender_based_search')) {
                
                Schema::table('users', function (Blueprint $table) {

                    $table->integer('gender_based_search')->default(0);
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
