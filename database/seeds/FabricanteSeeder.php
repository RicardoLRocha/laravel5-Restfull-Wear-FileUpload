

<?php

use Illuminate\Database\Seeder;
use App\Fabricante;


// Datos de prueba
use Faker\Factory as Faker;

class FabricanteSeeder extends Seeder {



/**
	Seeder:

	Son intrucciones que se ejecutan


	> php artisan db:seed

*/


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		for ($i=0; $i < 3; $i++) { 
			Fabricante::create([
				'nombre' => $faker->word(),
				'telefono' => $faker->randomNumber(6),
				'tipo' => 'autopartes',
				'foto' => 'uam.jpg'
			]);
		}
	}

}
