<?php namespace App;  
// Asociado igual que como se llama =>  App\Prueba


use Illuminate\Database\Eloquent\Model;

class Prueba extends Model{

	public function mi_saludo($nombre){
		return "procesa $nombre";
	}

}
