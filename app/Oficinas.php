<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficinas extends Model
{
    protected $table='oficinas';

    protected $fillable=['oficina'];

    public function pedidos_oficinas()
    {
    	return $this->hasMany('App\PedidosOficinas','id_oficina','id');
    }
    
}
