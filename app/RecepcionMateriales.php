<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecepcionMateriales extends Model
{
    protected $table='recepcion_materiales';

    protected $fillable=['fecha_solicitud','fecha_entrega','responsable'];

    public function materialesrecibidos()
    {
    	return $this->hasMany('App\MaterialesRecibidos','id_materialesrec','id');
    }
}
