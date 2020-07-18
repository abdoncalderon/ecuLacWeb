<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $fillable = ['nombre','descripcion','categoria_id','tipo_id','presentacion_id','precioUnitario','descuento','iva'];

    public function categoria($id){
        $categoria = Categoria::find($id);
        return $categoria->nombre;
    }

    public function tipo($id){
        $tipo = Tipo::find($id);
        return $tipo->nombre;
    }

    public function presentacion($id){
        $presentacion = Presentacion::find($id);
        return $presentacion->envase.'/'.$presentacion->contenido.'/'.$presentacion->medida;
    }

    static public function imagenPredeterminada($producto)
    {
        $producto=ImagenProducto::where('producto_id',$producto)->where('predeterminada',1)->first();
        if(!(empty($producto))){
            return $producto->imagen;
        }else{
            return "nofoto.jpg";
        }
    }

    static public function subtotal($productoId){
        $producto = Producto::find($productoId);
        return $producto::precioDescuento($productoId) + $producto::valorIva($productoId);
    }


    static public function precioDescuento($productoId){
        $producto = Producto::find($productoId);
        $precio = $producto->precioUnitario;
        $descuento = $producto::valorDescuento($productoId);
        if ($descuento > 0){
            return round(($precio - $descuento),2);
        }else{
            return round($precio,2);
        }
    }

    static public function valorDescuento($productoId){
        $producto = Producto::find($productoId);
        $precio = $producto->precioUnitario;
        $descuento = $producto->descuento;
        if ($descuento > 0){
            return round($precio * ($descuento / 100),2);
        }else{
            return 0;
        }
        
    }

    static public function valorIva($productoId){
        $producto = Producto::find($productoId);
        $precioDescuento = $producto->precioDescuento($productoId);
        $iva = $producto->iva;
        if ($iva > 0){
            return round($precioDescuento * ($iva / 100),2);
        }else{
            return 0;
        }
        
    }

    static public function actualizarExistencia($productoId,$movimiento,$cantidad)
    {
        $producto = Producto::find($productoId);
        $existenciaActual=$producto->existenciaActual;
        switch ($movimiento){
            case 'REPOSICION':
                $existenciaActual = $existenciaActual + $cantidad;
                break;
            case 'VENTA':
                $existenciaActual = $existenciaActual - $cantidad;
                break;
            case 'CANCELACION':
                $existenciaActual = $existenciaActual + $cantidad;
                break;
        }
        if ($existenciaActual>0){
            $estado='Disponible';
        }else{
            $estado='Agotado';
        }
        Producto::where('id',$productoId)->update([
            'existenciaActual' => $existenciaActual,
            'estado' => $estado,
        ]);
    }
}

