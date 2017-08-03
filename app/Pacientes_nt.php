<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes_nt extends Model
{
    protected $table='pacientes_nt';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','codigo_telf','telefono','direccion','edad','genero','titular','id_paciente'];

    public function pacientes()
    {
    	return $this->belongsTo('App\Pacientes','id_paciente');
    }

    public function consultas()
    {
    	return $this->hasMany('App\Consultas','id_pacientent','id');
    }

}
