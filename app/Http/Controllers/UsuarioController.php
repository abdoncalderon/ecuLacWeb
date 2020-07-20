<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Support\Facades\DB;
use Exception;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios=User::join('roles','users.rol_id','=','roles.id')->where('roles.esExterno','=','0')->paginate(10);
        return  view('usuarios.index',compact('usuarios'));
    }

    public function create(){
        $roles=Rol::where('esExterno',0)->where('id','!=',1)->get();
        return view('usuarios.create',compact('roles'));
    }

    public function store(StoreUsuarioRequest $request){
        User::create([
            'nombreCompleto' => $request['nombreCompleto'],
            'cedula'  => $request['cedula'],
            'telefono' => $request['telefono'],
            'email' =>  $request['email'],
            'rol_id' => $request['rol_id'],
            'usuario' => $request['usuario'],
            'password'=> Hash::make($request['password']),
        ]);
        return redirect()->route('usuarios.index');
    }

    public function edit(User $usuario){
        $roles=Rol::where('esExterno',0)->get();
        return view('usuarios.edit')
        ->with(compact('usuario'))
        ->with(compact('roles'));
    }

    public function update(UpdateUsuarioRequest $request, User $usuario){
        $usuario->update($request->validated());
        return redirect()->route('usuarios.index');
    }

    public function destroy(User $usuario){
        try {
            if($usuario->rol_id!=1){
                $usuario->delete();
                return redirect()->route('usuarios.index');
            }else{
                return back()->withErrors(__('messages.isSuperuser'));
            }
            
        } catch (Exception $e){

            return back()->withErrors(__('messages.isFather'));
        }
      
    }

    public function activate(User $usuario){
        
        if($usuario->estaActivo==0){
            $usuario=DB::table('users')->where('id',$usuario->id)->update(['estaActivo'=>1]);
        }else{
            $usuario=DB::table('users')->where('id',$usuario->id)->update(['estaActivo'=>0]);
        }
        return redirect()->route('usuarios.index');
    }
}


