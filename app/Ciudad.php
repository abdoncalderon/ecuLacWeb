<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    protected $fillable = ['nombre','provincia_id',];

    public function provincia($id){
        $provincia = Provincia::find($id);
        return $provincia->nombre;
    }
}
