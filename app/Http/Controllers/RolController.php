<?php
use App\Rol;
namespace App\Http\Controllers;

use App\Rol;
use App\User;
use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;

class RolController extends Controller
{
    public function index(){
        $roles = Rol::where('id','!=','0')->paginate(10);
        return view('roles.index',compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(StoreRolRequest $request )
    {
        Rol::create($request->validated());
        return redirect()->route('roles.index');
    }

    public function edit(Rol $rol){
        return view('roles.edit',[
            'rol'=>$rol
            ]);
    }

    public function update(UpdateRolRequest $request, Rol $rol){
        $request->validated();
        if($request->has('estaActivo')){
            $rol->update([
                'estaActivo' => '1',
            ]);
        }else{
            $rol->update([
                'estaActivo' => '0',
            ]);
        }
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $rol=Rol::find($id);
        $usuarios=User::where('rol_id',$rol->id)->get();
        if (count($usuarios)>0){
            return back()->withErrors(__('messages.isFather'));
        }else{
            $rol->delete();
            return redirect()->route('roles.index');
        }
    }
}
