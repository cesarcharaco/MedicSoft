<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_consulta extends Model
{
    protected $table='tipo_consulta';
    protected $fillable=['consulta','id_especialidad'];

    public function especialidades(){

    	return $this->belongsTo('App\Especialidades','id_especialidad');
    }
    public function consultasmontos(){

    	return $this->hasMany('App\ConsultasMontos','id_tipoconsulta','id');
    }

	public function laboratorios()
    {
    	return $this->hasMany('App\Laboratorios','id_tipoconsulta','id');	
    }    
    
    
}
