<?php namespace App;  
// Asociado igual que como se llama =>  App\Prueba


use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model{

	protected $table = 'fabricantes';

	protected $fillable = array('nombre', 'telefono', 'tipo', 'foto');

	
	/*	=====================================
	Ocultar en consulta JSON, param de DB
	===================================== */
	protected $hidden = ['created_at', 'upload_at'];

	// un fabricante, muchos vehiculos. one to many
	public function vehiculos(){
		return $this->hasMany('App\Vehiculo');
	}


}
