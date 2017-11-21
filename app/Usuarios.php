<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table='users';

    protected $fillable=['name','email','password','tipo_user'];

    
}
