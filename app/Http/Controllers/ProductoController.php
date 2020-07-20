<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Tipo;
use App\Presentacion;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::where('id','!=','0')->paginate(6);
        return view('productos.index',compact('productos'));
    }


    public function create()
    {
        $categorias=Categoria::all();
        $tipos=Tipo::all();
        $presentaciones=Presentacion::all();

        return view('productos.create')
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'));
    }

    public function store(StoreProductoRequest $request )
    {
        Producto::create($request->validated());
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        $categorias=Categoria::all();
        $tipos=Tipo::all();
        $presentaciones=Presentacion::all();
        return view('productos.edit')
        ->with(compact('producto'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'));
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $request->validated();
        if($request->has('esDestacado')){
            $esDestacado = '1';
        }else{
            $esDestacado = '0';
        }
        $producto->update([
            'descripcion'=>$request->descripcion,
            'precioUnitario'=>$request->precioUnitario,
            'descuento'=>$request->descuento,
            'iva'=>$request->iva,
            'esDestacado'=>$esDestacado,
            'estado'=>$request->estado,
        ]);
        return redirect()->route('productos.index');
    }


    public function getTiposCategoria(Request $request, $id)
    {
        if($request->ajax())
        {
            $tipos = Tipo::where('categoria_id',$id)->get();
            return response()->json($tipos);
        }
    }

    public function getPresentacionesCategoria(Request $request, $id)
    {
        if($request->ajax())
        {
            $presentaciones = Presentacion::where('categoria_id', $id)->get();
            return response()->json($presentaciones);
        }
    }
}
