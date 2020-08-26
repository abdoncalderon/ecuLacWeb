<?php

namespace App\Http\Controllers;

use App\ImagenProducto;
use App\Producto;
use App\Http\Requests\StoreImagenProductoRequest;
use Illuminate\Support\Facades\DB;

class ImagenProductoController extends Controller
{
    public function index(Producto $producto){
        $imagenes=ImagenProducto::where('producto_id',$producto->id)->get();
        return view('imagenesproductos.index',[
            'producto'=>$producto,
            ])->with(compact('imagenes'));
    }

    public function store(StoreImagenProductoRequest $request)
    {
        $producto = Producto::find($request->producto_id);
        if($request->hasFile('imagen'))
        {
            $archivo = $request->file('imagen');
            $nombreArchivo= time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/img/productos/',$nombreArchivo);
        }
        ImagenProducto::create([
            'imagen'=>$nombreArchivo,
            'producto_id'=>$request->producto_id,
        ]);
        return redirect()->route('imagenesproductos.index',$producto);
    }

    public function default(ImagenProducto $imagen)
    {
        $producto = Producto::find($imagen->producto_id);
        if($imagen->predeterminada!=1){
            $imagenes=DB::table('imagenes_productos')->where('producto_id',$imagen->producto_id)->where('id','!=',$imagen->id)->update(['predeterminada'=>0]);
            $imagen=DB::table('imagenes_productos')->where('id',$imagen->id)->update(['predeterminada'=>1]);
        }
        return redirect()->route('imagenesproductos.index',$producto);
    }

    public function destroy(ImagenProducto $imagen)
    {
        $nombreArchivo=$imagen->imagen;
        $producto=Producto::find($imagen->producto_id);
        
        if ($imagen->predeterminada==1){
            return back()->withErrors(__('messages.isDefault'));
        }else{
            $imagen->delete();
            unlink(public_path().'/img/productos/'.$nombreArchivo);
            return redirect()->route('imagenesproductos.index',$producto);
        }
    }
}
