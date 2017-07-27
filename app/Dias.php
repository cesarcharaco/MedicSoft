<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{
    protected $table='dias';
    protected $fillable=['dia'];

    public function turnos(){

    	return $this->hasMany('App\Turnos','id_dia','id');
    }
}
