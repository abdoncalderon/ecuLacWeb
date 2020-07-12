<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Cliente;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';
    

 
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'nombreCompleto'=>['required'],
            'cedula'=>['required','max:10','unique:users'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telefono'=>['required','max:15'],
            'rol_id'=>['required'],
            'usuario'=>['required','max:50','unique:users'],
            'password'=> ['required', 'string', 'min:8', 'confirmed'],
            'ciudad_id'=> ['required'],
            'direccion'=> ['required', 'string', 'max:255'],
            'latitud'=> ['string', 'max:50'],
            'longitud'=> ['string', 'max:50'], 

        ]);
    }
    
    protected function create(array $data)
    {
        $nuevoUsuario = User::create([
            'nombreCompleto' => $data['nombreCompleto'],
            'cedula'  => $data['cedula'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'rol_id' => $data['rol_id'],
            'usuario' => $data['usuario'],
            'password' => Hash::make($data['password']),

        ]);
        
        Cliente::create([
            'usuario_id'=>$nuevoUsuario->id,
            'ciudad_id'=>$data['ciudad_id'],
            'direccion'=>$data['direccion'],
        ]);

        return $nuevoUsuario;
        
    }
} 
