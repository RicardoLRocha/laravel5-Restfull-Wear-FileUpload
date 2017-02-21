

<?php

use Illuminate\Database\Seeder;



// Datos de prueba
use Faker\Factory as Faker;

class Oauth2Seeder extends Seeder {



/**
	Seeder:

	Son intrucciones que se ejecutan


	> php artisan db:seed

*/


	/**
	 * usado para OAUTH 2
	 *
	 * @return void
	 */
	public function run(){

		for ($i=1; $i < 10; $i++) { 
			DB::table('oauth_clients')->insert([
		
			'id'=> "id$i",
			'secret' => "secret$i",
			'name' => "cliente$i"

			]);
		}
	}
}
