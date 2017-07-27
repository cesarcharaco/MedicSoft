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

    	return $this->hasOne('App\ConsultasMontos','id_tipoconsultas','id');
    }

    
    
}
