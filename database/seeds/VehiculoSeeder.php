

<?php

use Illuminate\Database\Seeder;
use App\Fabricante;
use App\Vehiculo;


// Datos de prueba
use Faker\Factory as Faker;

class VehiculoSeeder extends Seeder {



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
		$cantidad = Fabricante::all()->count();

		for ($i=0; $i < 50; $i++) { 
			Vehiculo::create([
				'color' => $faker->safeColorName(),
				'cilindraje' => $faker->randomFloat(),
				'potencia' => $faker->randomNumber(),
				'peso' => $faker->randomFloat(),
				'fabricante_id' => $faker->numberBetween(1, $cantidad)

			]);
		}


	}

}
