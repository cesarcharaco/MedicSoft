<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultasLab extends Model
{
    protected $table='consultaslab';

    protected $fillable=['id_pacientent','fecha','estado','posicion','cantidad'];

    public function pacientesnt()
    {
    	return $this->belongsTo('App\Pacientes_nt','id_pacientent');
    }

    public function consultaslaboratorios()
    {
    	return $this->belongsTo('App\ConsultasLaboratorios','id_consultalab','id');
    }
}
