<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table='pacientes';

    protected $fillable=['nombres','apellidos','nacionalidad','cedula','codigo_telf','telefono','direccion','titular','institucion'];

    public function consultas()
    {
    	return $this->hasMany('App\Consultas','id_paciente','id');
    }
    
}
