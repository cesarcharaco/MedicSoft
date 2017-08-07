<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidosOficinas extends Model
{
    protected $table='pedidos_oficinas';

    protected $fillable=['id_oficina','solicitante','nacionalidad','cedula','fecha','codigo'];

    public function oficinas()
    {
    	return $this->belongsTo('App\Oficinas','id_oficina');
    }

    public function materiales()
    {
    	return $this->belongsToMany('App\Materiales','materiales_pedidos','id_pedido','id_material')->withPivot('cantidad')->withTimestamps();
    }
}
