<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Fabricante;
use App\Vehiculo;



class FabricanteVehiculoController extends Controller {


	/** =============================================
	Creando mi middleware de autentificacion para algunos metodos URL
	============================================= */
	public function __construct(){

		$this->middleware('auth.basic', ['only' => ['store', 'update', 'destroy']]  );
	}


	/** http://localhost/curso%20laravel/rest_project/server.php/fabricantes/1/vehiculos
	 * Display a listing of the resource.
	 * Mostrar una lista del recurso.
	 * 
	 * Regresa los vehiculos de un fabricante
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$fabricante = Fabricante::find($id);

		if(!fabricante){
			
			return response()->json([
				'menssage' => "Not found manufacturer",
				"error" => True
				], 404);
		}else{
			// 2 forma de hacerlo 
			// return response()->json(['data' => $fabricante->vehiculos()->get()], 200);

			return response()->json([
				'data' => $fabricante->vehiculos,
				"error" => False
				], 200);

		}
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/** http://localhost/curso%20laravel/rest_project/server.php/fabricantes/1/vehiculos
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $id){ // ...fabricantes/{id}

		// Campos de vehiculo:  'color', 'cilindraje', 'potencia', 'peso', 'fabricante_id'

		/** ========================================
		Campos/ fields de Postman
		======================================== */
		if( !$request-> input('color') || 
			!$request-> input('cilindraje') || 
			!$request-> input('potencia') || 
			!$request-> input('peso') ){

			return response()->json([
				'menssage' => "Complete required fields",
				"error" => True
				], 422);
		}

		$fabricante = Fabricante::find( $request->input($id) );
		if( !$fabricante){
			return response()->json([
				'menssage' => "There is no manufacturer",
				"error" => True
				], 422);
		
		}

		$fabricante->vehiculos()->create( $request->all() );
		
		return response()->json([
			'menssage' => 'successful',
			'error' => False,
			'data_fabricante' => $fabricante,
			'data_vehiculo' => $fabricante->vehiculos()
			], 200);

	}


	/** http://localhost/curso%20laravel/rest_project/server.php
	* 
	* http://localhost/curso%20laravel/rest_project/server.php/fabricantes/3/vehiculos/5
	*
	* Display the specified resource.
	*
	* Del fabricante con id, tal vehiculo
	* @param  int  $id, 
	* @return Response
	*/
	public function show($id_fabricante, $id_vehiculo ){
		return "fabricante ".$id_fabricante." con vehiculo ".$id_vehiculo;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $id_fabricante, $id_vehiculo )
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
