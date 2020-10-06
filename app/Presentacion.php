<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    protected $table = 'presentaciones';

    protected $fillable = ['categoria_id','envase','contenido','medida',];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
