<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre','descripcion','imagen','estaActivo',];
    
    
    public function estado(){
        if($this->estaActivo==1){
            return __('content.active');
        }else{
            return __('content.inactive');
        } 
    }

}
