<?php


/** ================================================
Creamos nuestros propio 

modelo Prueba con clase: PruebaMiClass y metodo: mi_saludo
controlador  con Clase: MyController  y metodo: index
vista  en resources/views/prueba/index.prueba.php  recibe: {{$var_enviada}}
================================================ */
Route::get('/ruta_prueba', 'MyController@index');



/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

/** ===============================================
Se crean en automatico todas las ruta del REST POST, PUT... etc 

Notar que solo crearemos un vehiculo si existe la Fabrica, lo cubrimos en 
fabricantes.vehiculos

=============================================== */

// Versionamiento en URL del REST
Route::group( array('prefix' => 'api/v1.0'), function(){ // functon clousure

 // se meten todas las URL Route:: de abajo

	
});

// rompe con idea de REST
// Route::get('/','VehiculoController@show_all');
Route::resource('vehiculos','VehiculoController', ['only' => ['index', 'show']]);
Route::resource('fabricantes','FabricanteController', ['except' => ['edit', 'create']]);
Route::resource('fabricantes.vehiculos','FabricanteVehiculoController', ['except' => ['show', 'edit', 'create']]);

// > php artisan make:controller VehiculoOperacionesController
Route::get('vehiculos/op/costo/mayor', 'VehiculoOperacionesController@costo_mayor');
Route::post('vehiculos/op/costo/mayor/que', 'VehiculoOperacionesController@cost_major_that');
Route::get('vehiculos/op/costo/entre', 'VehiculoOperacionesController@cost_between');



/**
Laravel lee secuencialmente las Rutas URL, por eso las que no existen se ponen abajo
*/
Route::pattern('inexistente', '.*');
Route::any('/{inexistente}', function(){

	return response()->json([
			'menssage' => "Rutas incorrectas",
			"error" => True
			], 404);
});

// Route::match(['get', 'post'], '/', ... )


# Quitamos URL fabricante/{id}/vehiculo/{id} porque ya lo tenemos practicamente en URL vehiculo/{id}




