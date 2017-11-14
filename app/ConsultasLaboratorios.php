<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultasLaboratorios extends Model
{
    protected $table='consultas_laboratorios';

    protected $fillable=['id_consultalab','id_tipoconsulta','cantidad'];

    public function consultaslab()
    {
    	return $this->hasMany('App\ConsultasLab','id_consultalab');
    }

    public function tipoconsultas()
    {
    	return $this->hasMany('App\Tipo_consulta','id_tipoconsulta');
    }
}
