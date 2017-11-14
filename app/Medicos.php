<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    protected $table='medicos';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','codigo_telf','telefono','direccion','id_especialidad'];

    public function especialidades(){

    	return $this->belongsTo('App\Especialidades','id_especialidad');
    }

    public function consultas()
    {
    	return $this->hasMany('App\Medicos','id_medico','id');
    }
}
