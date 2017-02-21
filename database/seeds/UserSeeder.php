

<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder {


	/**
	 * usado paa autenticacion Basic 
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'email' => 'thrafiker@gmail',
			'password' => Hash::make('1234')
			]);
		
		User::create([
			'email' => 'richi@gmail',
			'password' => Hash::make('1234')
			]);

		
	}

}
