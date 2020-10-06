<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $fillable = ['nombre'];

    public function ciudades(){
        return $this->hasMany(Ciudad::class);
    }
}
