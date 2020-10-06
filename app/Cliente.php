<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['usuario_id','ciudad_id','direccion','latitud','longitud'];

    protected $primaryKey = 'usuario_id';

    public function user(){
        return $this->belongsTo(User::class,'usuario_id');
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
       
}
