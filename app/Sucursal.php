<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    protected $fillable = ['nombre','ciudad_id','direccion','telefono'];

    public function ciudad($id){
        $ciudad = Ciudad::find($id);
        return $ciudad->nombre;
    }
}
