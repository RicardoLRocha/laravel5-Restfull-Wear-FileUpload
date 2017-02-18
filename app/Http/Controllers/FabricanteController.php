<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

# use App\Fabricante as FabricanteModel; 
use App\Fabricante;

class FabricanteController extends Controller {



	/** =============================================
	Creando mi middleware de autentificacion para algunos metodos URL
	============================================= */
	public function __construct(){

		$this->middleware('auth.basic', ['only' => ['store', 'update', 'destroy']]  );
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return JSON
	 */
	public function index(){
		
		// antes Responce::JSON

		return response()->json(['data' => Fabricante::all()], 200);
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

	/** http://localhost/curso%20laravel/rest_project/server.php/fabricantes/
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request $request ){

		if( !$request-> input('nombre') || 
			!$request-> input('telefono') || 
			!$request-> input('tipo') || 
			!$request-> input('foto')  ){

			return response()->json([
				'menssage' => "Complete required fields",
				"error" => True
				], 422);
		}


		Fabricante::create( $request->all() );

		return response()->json([
			'menssage' => "successful",
			"error" => False
			], 200);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		$fabricante = Fabricante::find($id);
		
		if(!$fabricante){
			return response()->json([
				'menssage' => "Not found manufacturer",
				"error" => True
				], 404);
		}else{
			return response()->json([
				'menssage' => $fabricante,
				 'error' => False
				 ], 200);
		}
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
	public function update($id)
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
