<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultasLaboratorios extends Model
{
    protected $table='consultas_laboratorios';

    protected $fillable=['id_consultalab','id_consultamonto'];

    public function consultaslab()
    {
    	return $this->hasMany('App\ConsultasLab','id_consultalab');
    }

    public function consultasmontos()
    {
    	return $this->hasMany('App\ConsultasMontos','id_consultamonto');
    }
}
