<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    protected $table='consultas';
    protected $fillable=['id_paciente','id_consultamonto','fecha'];

    public function pacientes()
    {

    	return $this->belongsTo('App\Pacientes','id_paciente');
    }

    public function consultasmontos()
    {
    	
    	return $this->belongsTo('App\ConsultasMontos','id_consultamonto');
    }
}
