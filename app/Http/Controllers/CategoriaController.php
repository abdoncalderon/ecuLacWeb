<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Exception;
class CategoriaController extends Controller
{
    /*************************************************************************************************************************/
    public function index(){
        $categorias = Categoria::where('id','!=','0')->paginate(10);
        return view('categorias.index',compact('categorias'));
    }

    /*************************************************************************************************************************/
    public function create(){
        return view('categorias.create');
    }

    /*************************************************************************************************************************/
    public function store(StoreCategoriaRequest $request ){
        if($request->hasFile('imagen'))
        {
            $archivo = $request->file('imagen');
            $nombreArchivo= time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/img/categorias/',$nombreArchivo);
        }else{
            $nombreArchivo="nofoto.jpg";
        }
        $request->validated();
        Categoria::create([
            'nombre'=>$request->nombre,
            'imagen'=>$nombreArchivo,
            'descripcion'=>$request->descripcion,
        ]);
        return redirect()->route('categorias.index');
    }

    /*************************************************************************************************************************/
    public function edit(Categoria $categoria){
        return view('categorias.edit',[
            'categoria'=>$categoria
            ]);
    }

    /*************************************************************************************************************************/
    public function update(UpdateCategoriaRequest $request, Categoria $categoria){
        if($request->hasFile('imagen'))
        {
            $archivo = $request->file('imagen');
            $nombreArchivo= time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/img/categorias/',$nombreArchivo);
        }else{
            $nombreArchivo = $categoria->imagen;
        }
        $request->validated();
        if($request->has('estaActivo')){
            $categoria->update([
                'descripcion'=>$request->descripcion,
                'imagen' => $nombreArchivo,
                'estaActivo' => '1',
            ]);
        }else{
            $categoria->update([
                'descripcion'=>$request->descripcion,
                'imagen' => $nombreArchivo,
                'estaActivo' => '0',
            ]);
        }
        return redirect()->route('categorias.index');
    }

    /*************************************************************************************************************************/
    public function destroy(Categoria $categoria){
        try{
            $nombreArchivo=$categoria->imagen;
            $categoria->delete();
            unlink(public_path().'/img/productos/'.$nombreArchivo);
            return redirect()->route('categorias.index');
        }catch (Exception $e){
            return back()->withErrors(__('messages.isFather'));
        }
    }


    
}
