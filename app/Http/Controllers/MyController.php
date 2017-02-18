<?php namespace App\Http\Controllers;


use App\Prueba;

class MyController extends Controller {

	public function index(){

		// instalaciamos modelo, traido arriba 
		$model = new Prueba();

		$saludo = $model->mi_saludo('Ricardo');
		return view('prueba.index', ['var_enviada' => $saludo]);
	}
}

