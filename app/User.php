<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nombreCompleto', 'cedula', 'email', 'telefono', 'rol_id', 'usuario', 'password','estaActivo',];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol($id){
        $rol = Rol::find($id);
        return $rol->nombre;
    }

    static public function ciudad($ciudadId){
        $ciudad = Ciudad::find($ciudadId);
        return $ciudad->nombre;
    }

}
