<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombreCompleto', 'cedula', 'email', 'telefono', 'rol_id', 'usuario', 'password','estaActivo', 
    ];

   
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

    static public function crearSuperUsuario(){
        $usuarios = User::all();
        if(count($usuarios)<1){
            $roles=Rol::all();
            if(count($roles)<1){
                ROl::create([
                    'nombre'=>'SUPERUSUARIO'
                ]);
            }
            User::create([
                'nombreCompleto' => 'Super Usuario',
                'cedula'=>'0000000000',
                'telefono'=>'0000000000',
                'email' => 'example@email.com',
                'usuario'  => 'superusuario',
                'password' => Hash::make('1234567890'),
                'rol_id' => '1',
                'estaActivo'=> '1',
            ]);
        }
        
    }

}
