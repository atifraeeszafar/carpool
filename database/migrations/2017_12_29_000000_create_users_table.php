<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->string('username', 25)->unique()->nullable();
			$table->string('email', 150)->unique()->nullable();
			$table->string('password')->nullable();
			$table->string('mobile', 14)->unique();
			$table->string('profile_picture')->nullable();
			$table->boolean('active')->default(true);
			$table->boolean('email_confirmed')->default(false);
			$table->boolean('mobile_confirmed')->default(false);
			$table->string('email_confirmation_token')->nullable();
			$table->string('device_token')->nullable();
			$table->tinyInteger('login_by')->nullable();
			$table->rememberToken();
			$table->ipAddress('last_known_ip')->nullable();
			$table->timestamp('last_login_at')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
