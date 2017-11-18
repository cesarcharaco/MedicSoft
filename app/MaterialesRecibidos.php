<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialesRecibidos extends Model
{
    protected $table='materiales_recibidos';

    protected $fillable=['id_materialesrec','id_material','cantidad'];

    public function recepcionmateriales()
    {
    	return $this->belongsTo('App\RecepcionMateriales','id_materialesrec');
    }
}
