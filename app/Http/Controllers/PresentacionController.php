<?php

namespace App\Http\Controllers;


use App\Categoria;
use App\Presentacion;

use App\Http\Requests\StorePresentacionRequest;
use App\Http\Requests\UpdatePresentacionRequest;
use Illuminate\Support\Arr;

class PresentacionController extends Controller
{

    public function index(){
        $presentaciones = Presentacion::where('id','!=','0')->paginate(10);
        return view('presentaciones.index',compact('presentaciones'));
    }

    public function create()
    {
        $envases = array('Carton','Funda','Tarro','Botella','Tarrina');
        $medidas = array('Gramos','Onzas','Litros','Libras','Kilos');
        $categorias=Categoria::where('id','!=','0')->paginate(10);

        return view('presentaciones.create')
        ->with(compact('categorias'))
        ->with(compact('medidas'))
        ->with(compact('envases'));
    }

    public function store(StorePresentacionRequest $request )
    {
        Presentacion::create($request->validated());
        return redirect()->route('presentaciones.index');
    }

    public function edit(Presentacion $presentacion)
    {
        $envases = array('Carton','Funda','Tarro','Botella');
        $medidas = array('Gramox','Onzas','Litros','Libras','Kilos');
        $categorias = Categoria::all();
               
        return view('presentaciones.edit',[
            'presentacion'=>$presentacion
            ])
        ->with(compact('categorias'))
        ->with(compact('medidas'))
        ->with(compact('envases'));
    }

    public function update(UpdatePresentacionRequest $request, Presentacion $presentacion)
    {
        $presentacion->update($request->validated());
        return redirect()->route('presentaciones.index');
    }

    public function destroy($id)
    {
        Presentacion::destroy($id);
        return redirect()->route('presentaciones.index');
    }
}
