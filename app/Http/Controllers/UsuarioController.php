<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Exception;

class UsuarioController extends Controller
{
    /*************************************************************************************************************************/
    public function index(){
        $usuarios=User::select('users.id','users.nombreCompleto','users.estaActivo', 'users.rol_id','roles.esExterno')->join('roles','users.rol_id','=','roles.id')->where('roles.esExterno','=','0')->paginate(10);
        return  view('usuarios.index')
        ->with(compact('usuarios'));
    }

    /*************************************************************************************************************************/
    public function create(){
        $roles=Rol::where('esExterno',0)->where('id','!=',1)->get();
        return view('usuarios.create',compact('roles'));
    }

    /*************************************************************************************************************************/
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

    /*************************************************************************************************************************/
    public function edit(User $usuario){
        $roles=Rol::where('esExterno',0)->get();
        return view('usuarios.edit')
        ->with(compact('usuario'))
        ->with(compact('roles'));
    }

    /*************************************************************************************************************************/
    public function update(UpdateUsuarioRequest $request, $usuarioId){
        $usuario=User::find($usuarioId);
        $request->validated();
        if($request->has('estaActivo')){
            $estaActivo = '1';
        }else{
            $estaActivo = '0';
        }
        $usuario->update([
            'nombreCompleto' => $request['nombreCompleto'],
            'cedula'  => $request['cedula'],
            'email' =>  $request['email'],
            'telefono' => $request['telefono'],
            'rol_id' => $request['rol_id'],
            'usuario' => $request['usuario'],
            'estaActivo'=>$estaActivo,
        ]);
        return redirect()->route('usuarios.index');
    }

    /*************************************************************************************************************************/
    public function destroy($usuarioId){
        try {
            $usuario=User::find($usuarioId);
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

    /*************************************************************************************************************************/
    public function activate($usuarioId){
        $usuario=User::find($usuarioId);
        if($usuario->estaActivo==0){
            $usuario->update(['estaActivo'=>1]);
        }else{
            $usuario->update(['estaActivo'=>0]);
        }
        return redirect()->route('usuarios.index');
    }
}


