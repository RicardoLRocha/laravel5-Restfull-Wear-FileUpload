<?php namespace App;  
// Asociado igual que como se llama =>  App\Prueba


use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model{

	protected $table = 'fabricantes';

	protected $fillable = array('nombre', 'telefono');

	// un fabricante, muchos vehiculos. one to many
	public function vehiculos(){
		$this->hasMany('Vehiculo');
	}

	
}
