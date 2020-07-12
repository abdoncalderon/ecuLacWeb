<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['usuario_id','ciudad_id','direccion','latitud','longitud'];
}
