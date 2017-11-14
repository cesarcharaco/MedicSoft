<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultasMontos extends Model
{
    protected $table='consultas_montos';
    protected $fillable=['id_tipoconsulta','monto','fecha'];

    public function tipoconsultas(){

    	return $this->belongsTo('App\Tipo_consulta','id_tipoconsulta');
    }

    public function consultas()
    {
    	return $this->hasMany('App\Consultas','id_consultamonto','id');
    }

    public function consultaslaboratorios()
    {
    	return $this->belongsTo('App\ConsultasLaboratorios','id_consultamonto','id');
    }
}
