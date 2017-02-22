<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/** =================================================
	Usar seguridad Token predefinida en Laravel

-- archivos involucrados
rest/project/app/user.php
rest/project/database/migration/2017_02_18_190557_user.php

> php artisan make:migration user --create=users

> php artisan migrate

================================================= */


class User extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password');
			$table->nullableTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
