<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialesSolicitados extends Model
{
    protected $table='materiales_solicitados';

    protected $fillable=['id','fecha','id_material','cantidad'];

    public function materiales()
    {
    	return $this->belongsTo('App\Materiales','id_material');
    }
}
