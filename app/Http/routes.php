<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/** ================================================
Creamos nuestros propio 

modelo Prueba con clase: PruebaMiClass y metodo: mi_saludo
controlador  con Clase: MyController  y metodo: index
vista  en resources/views/prueba/index.prueba.php  recibe: {{$var_enviada}}
================================================ */
Route::get('/', 'MyController@index');

// Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
