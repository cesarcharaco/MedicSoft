<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorios extends Model
{
    protected $table='laboratorios';

    protected $fillable=['id_tipoconsulta','disponiblidad'];

    public function tipoconsulta()
    {
    	return $this->belongsTo('App\Tipo_consulta','id_tipoconsulta');
    }
}
