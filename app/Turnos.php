<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turnos extends Model
{
    protected $table='turnos';
    protected $fillable=['id_dia','momento'];

    public function dias(){

    	return $this->belongsTo('App\Dias','id_dia');
    }

    public function horarios()
    {
    	return $this->hasMany('App\Horarios','id_turno','id');
    }
}
