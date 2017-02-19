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
	public function update(Request $request, $id){

		/** ========================================
			PUT actualizar conjunto completo 
			PATCH obtener y sustituir solo 1 elemento
		======================================== */
		
		$fabricante = Fabricante::find($id);

		if(!$fabricante){
			return response()->json([
				'menssage' => "Not found manufacturer",
				"error" => True
				], 404);
		}else{

			$metodo = $request->method();

			if( $method === 'PATCH' ){

				$nombre = $request->input('nombre');
 				if($nombre != null && $nombre != '')
					$fabricante->nombre = $nombre;
 
 				$telefono = $request->input('telefono');

 				if($telefono != null && $telefono != '')
 					$fabricante->telefono = $telefono;
				
 				$tipo = $request->input('tipo');
 				if($tipo != null && $tipo != '')
					$fabricante->tipo = $tipo;
 
 				$foto = $request->input('foto');

 				if($foto != null && $foto != '')
 					$fabricante->foto = $foto;

			
				$fabricante->save();
													
				return response()->json([
					'menssage' => 'successful update',
					'data' => $fabricante,
					'error' => False
					], 200);
					
			}else{ // PUT
				
				$nombre = $request->input('nombre');
				$telefono = $request->input('telefono');
				$tipo = $request->input('tipo');
 				$foto = $request->input('foto');


				if(!$nombre || !$telefono || !$tipo || !$foto )
					return response()->json([
						'mensaje' => 'No se pudieron procesar los valores', 
						'error' => True
						],422);

				$fabricante->nombre = $nombre;
				$fabricante->telefono = $telefono;
				$fabricante->tipo = $tipo;
				$fabricante->foto = $foto;

				$fabricante->save();
				
				return response()->json([
					'mensaje' => 'Fabricante editado',
					'error' => False
					], 200);
					
			}
			
		}

	}



	private function procesa_patch($val_input){
    if( $val_input != null && $val_input != '' ){
			$nuevo_val->nombre = $request->input('nombre');
			return $nuevo_val;
    }else{
    	return;
    }

	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		$fabricante = Fabricante::find($id);
 
 		if(!$fabricante)
 			return response()->json([
 				'message' => 'No se encuentra este fabricante',
 				'error' => True
 				],404);
			
		$vehiculos = $fabricante->vehiculos;

		if(sizeof($vehiculos) > 0)
			return response()->json([
				'message' => 'Este fabricante posee vehiculos asociados, elimine primero sus vehiculos.', 
				'error' => True
				],409);

		$fabricante->delete();

		return response()->json(['message' => 'Fabricante eliminado'],200);
	}

}
