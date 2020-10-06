<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $fillable = ['nombre','descripcion','categoria_id','tipo_id','presentacion_id','precioUnitario','descuento','iva','estado','esDestacado'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    public function presentacion(){
        return $this->belongsTo(Presentacion::class);
    }

    static public function imagenPredeterminada($producto){
        $producto=ImagenProducto::where('producto_id',$producto)->where('predeterminada',1)->first();
        if(!(empty($producto))){
            return $producto->imagen;
        }else{
            return "nofoto.jpg";
        }
    }
   
    public function subtotal(){
        return $this->precioDescuento() + $this->valorIva();
    }
   
    public function precioDescuento(){
        $precio = $this->precioUnitario;
        $descuento = $this->valorDescuento();
        return round(($precio - $descuento),2);
    }
   
    public function valorDescuento(){
        $precio = $this->precioUnitario;
        $descuento = $this->descuento;
        if ($descuento > 0){
            return round($precio * ($descuento / 100),2);
        }else{
            return 0;
        }
    }

    public function valorIva(){
        $iva = $this->iva;
        if ($iva > 0){
            return round($this->precioDescuento() * ($iva / 100),2);
        }else{
            return 0;
        }
    }

    static public function actualizarExistencia($productoId,$movimiento,$cantidad){
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

