<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre','descripcion','imagen','estaActivo',];

    public function estado($estaActivo){
        if($estaActivo==1){
            $estado=__('content.active');
        }else{
            $estado=__('content.inactive');
        }
        return $estado; 
    }
}
