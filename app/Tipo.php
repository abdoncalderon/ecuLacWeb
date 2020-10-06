<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = ['nombre','categoria_id',];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
