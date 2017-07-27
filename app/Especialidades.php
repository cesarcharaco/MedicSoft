<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    protected $table='especialidades';
    protected $fillable=['especialidad'];

    public function tipoconsultas(){

    	return $this->hasMany('App\Tipo_consulta','id_especialidad','id');
    }

    public function medicos(){

    	return $this->hasOne('App\Medicos','id_especialidad');
    }

    public function horarios()
    {
    	return $this->hasMany('App\Horarios','id_especialidad','id');
    }
}
