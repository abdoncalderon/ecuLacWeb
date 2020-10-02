<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Tipo;
use App\Http\Requests\StoreTipoRequest;
use App\Http\Requests\UpdateTipoRequest;

class TipoController extends Controller
{
       
    /*************************************************************************************************************************/
    public function index(){
        $tipos=Tipo::where('id','!=','0')->paginate(10);
        return view('tipos.index',compact('tipos'));
    }
    
    /*************************************************************************************************************************/
    public function create()
    {
        $categorias=Categoria::all();
        return view('tipos.create',compact('categorias'));
    }

    /*************************************************************************************************************************/
    public function store(StoreTipoRequest $request )
    {
        Tipo::create($request->validated());
        return redirect()->route('tipos.index');
    }

    /*************************************************************************************************************************/
    public function edit(Tipo $tipo)
    {
        $categorias = Categoria::all();
        return view('tipos.edit',[
            'tipo'=>$tipo
            ])
        ->with(compact('categorias'));
    }

    /*************************************************************************************************************************/
    public function update(UpdateTipoRequest $request, Tipo $tipo)
    {
        $tipo->update($request->validated());
        $pestana='tipos';
        return redirect()->route('tipos.index');
    }

    /*************************************************************************************************************************/
    public function destroy($id)
    {
        Tipo::destroy($id);
        $pestana='tipos';
        return redirect()->route('tipos.index');
    }
}
