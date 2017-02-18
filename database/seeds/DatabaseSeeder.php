<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


use App\User;

class DatabaseSeeder extends Seeder {



/**
	Seeder:

	Son intrucciones que se ejecutan
*/


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// deshacer asignaciones masivas
		// Model::unguard();

		$this -> call('FabricanteSeeder');
		$this -> call('VehiculoSeeder');
		
		// truncar informacion e inserta de nuevo
		User::Truncate();
		$this -> call('UserSeeder');
	}

}
