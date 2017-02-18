<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Vehiculo;


/* ==================================================================
	Esta clase es abierta al publico, para ver todos los vehiculos
================================================================== */
class VehiculoController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){

		return response()->json(['data' => Vehiculo::all()], 200);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		
		$vehiculo = Vehiculo::find($id);
		
		if(!$vehiculo){
			return response()->json([
				'menssage' => "Not found vehicle", 
				"error" => True
				], 404);
		}else{
			return response()->json(['menssage' => $vehiculo, 'error' => False], 200);
		}
	}

	
}
