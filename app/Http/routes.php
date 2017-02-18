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

// rompe con idea de REST
// Route::get('/','VehiculoController@show_all');
Route::resource('vehiculos','VehiculoController', ['only' => ['index', 'show']]);
Route::resource('fabricantes','FabricanteController');
Route::resource('fabricantes.vehiculos','FabricanteVehiculoController', ['except' => ['show']]);

// > php artisan make:controller VehiculoOperacionesController
Route::get('vehiculos/op/costo/mayor', 'VehiculoOperacionesController@costo_mayor');
Route::post('vehiculos/op/costo/mayor/que', 'VehiculoOperacionesController@cost_major_that');
Route::get('vehiculos/op/costo/entre', 'VehiculoOperacionesController@cost_between');



// Route::match(['get', 'post'], '/', ... )


# Quitamos URL fabricante/{id}/vehiculo/{id} porque ya lo tenemos practicamente en URL vehiculo/{id}




