<?php

namespace App\Http\Controllers;

use App\Provincia;
use App\Ciudad;
use App\Sucursal;
use App\Http\Requests\StoreCiudadRequest;
use App\Http\Requests\UpdateCiudadRequest;

class CiudadController extends Controller
{
    public function index(){
        $ciudades = Ciudad::where('id','!=','0')->paginate(10);
        return view('ciudades.index',compact('ciudades'));
    }

    public function create()
    {
        $provincias=Provincia::all();
        return view('ciudades.create',compact('provincias'));
    }

    public function store(StoreCiudadRequest $request )
    {
        $request->validated();
        Ciudad::create([
            'nombre'=>$request['nombre'],
            'provincia_id'=>$request['provincia_id'],
            'nombre_provincia_idx'=>$request['nombre'].$request['provincia_id'],
        ]);
        return redirect()->route('ciudades.index');
    }

    public function edit(Ciudad $ciudad)
    {
        $provincias = Provincia::all();
        return view('ciudades.edit',[
            'ciudad'=>$ciudad
            ])
        ->with(compact('provincias'));
    }

    public function update(UpdateCiudadRequest $request, Ciudad $ciudad)
    {
        $ciudad->update($request->validated());
        return redirect()->route('ciudades.index');
    }

    public function destroy($id)
    {
        $ciudad=Ciudad::find($id);
        $sucursales=Sucursal::where('ciudad_id',$ciudad->id)->get();
        if (count($sucursales)>0){
            return back()->withErrors(__('messages.isFather'));
        }else{
            $ciudad->delete();
            
            return redirect()->route('ciudades.index');
        }
    }
}
