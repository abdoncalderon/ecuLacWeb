<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'nombre'=>'required|max:100|unique:productos',
            'descripcion'=>'required|max:255|unique:productos',
            'categoria_id'=>'required',
            'tipo_id'=>'required',
            'presentacion_id'=>'required',
            'precioUnitario'=>'required|numeric',
            'descuento'=>'required|numeric',
            'iva'=>'required|numeric',
        ];
    }
    
}
