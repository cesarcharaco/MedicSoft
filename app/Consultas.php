<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    protected $table='consultas';
    protected $fillable=['id_pacientent','id_consultamonto','fecha','estado','posicion','diagnostico','id_medico'];

    public function pacientesnt()
    {

    	return $this->belongsTo('App\Pacientes_nt','id_pacientent');
    }

    public function consultasmontos()
    {
    	
    	return $this->belongsTo('App\ConsultasMontos','id_consultamonto');
    }

    public function medicos()
    {
        return $this->belongsTo('App\Medicos','id_medico');
    }
}
