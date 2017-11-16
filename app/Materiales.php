<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
    protected $table='materiales';

    protected $fillable=['tipo_material','descripcion','modelo_marca','serial','stock_min','stock_max','disponible'];

    public function pedidos_oficinas()
    {
    	return $this->belongsToMany('App\PedidosOficinas','materiales_pedidos','id_material','id_pedido')->withPivot('cantidad')->withTimestamps();
    }
}
