<?php namespace App;  
// Asociado igual que como se llama =>  App\Prueba


use Illuminate\Database\Eloquent\Model;

"""
Version 5.1 es Eloquent en logar de Model 

Ver en archivo Model de laravel
variables:
autoincrement y timestamp = true 

se agregar a la DB automaticamente o cambia a FALSE 


Borrar migraciones de database/migration

"""

class Vehiculo extends Model{

	protected $table = 'vehiculos';

	protected $primaryKey = 'serie';

	protected $fillable = array('color', 'cilindraje', 'protencia' );



	/** ======================================
		si fuera que muchos fabricantes tienen 1 producto

		seria @belongsToMany('MAYUS')
	
		Ojo en mayuscula
	====================================== */
	public function fabricante(){
		$this->belongsTo('Fabricante');
	}

}
