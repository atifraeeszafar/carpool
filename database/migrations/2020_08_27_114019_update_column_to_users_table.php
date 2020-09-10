<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('gender')->after('email')->default(1)->comment('1 => male, 2 => female');

            $table->string('lastname')->after('name')->nullable($value=true);

            $table->string('country')->after('login_by')->nullable($value=true);
            $table->string('state')->after('login_by')->nullable($value=true);
            $table->string('city')->after('login_by')->nullable($value=true);

            $table->date('date_of_birth')->after('login_by')->nullable($value=true);
            $table->string('dial_code')->after('mobile')->nullable($value=true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
