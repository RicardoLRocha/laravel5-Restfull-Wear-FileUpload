<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Fabricante;
use App\Vehiculo;


class VehiculoOperacionesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response JSON
	 */
	public function costo_mayor() {

		//$peso = DB::table('vehiculos')->max('peso');
		$peso = Vehiculo::max('peso');
		
		return response()->json([
			'message' => 'Vehiculo de mayor costo',
			'data' => $peso,
			"error" => False
			], 200);	
	}


	/** http://localhost/curso%20laravel/rest_project/server.php/vehiculos/op/costo/mayor/que
	 * 
	 *
	 * @return Response JSON
	 */
	public function cost_major_that(Request $request) {

		$peso = Vehiculo::whereRaw('peso > '.$request->input('major') )->get();

		return response()->json([
				'data' => $peso,
				"error" => False
				], 200);
	}

	/** http://localhost/curso%20laravel/rest_project/server.php/vehiculos/op/costo/mayor/que
	 * 
	 *
	 * @return Response JSON
	 */
	public function cost_between(Request $request) {

		$peso = Vehiculo::whereRaw('peso between '.$request->input('major') )->get();

		return response()->json([
				'data' => $peso,
				"error" => False
				], 200);
	}



}


