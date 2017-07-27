<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table='horarios';
    protected $fillable=['id_especialidad','id_turno','estado'];

    public function especialidades(){

    	return $this->belongsTo('App\Especialidades','id_especialidad');
    }

    public function turnos(){

    	return $this->belongsTo('App\Turnos','id_turno');
    }
}
