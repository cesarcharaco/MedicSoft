<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    protected $table='consultas';
    protected $fillable=['id_pacientent','id_consultamonto','fecha','estado','posicion','diagnostico'];

    public function pacientesnt()
    {

    	return $this->belongsTo('App\Pacientes_nt','id_pacientent');
    }

    public function consultasmontos()
    {
    	
    	return $this->belongsTo('App\ConsultasMontos','id_consultamonto');
    }
}
