<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'descripcion'=>'required|max:255',
            'precioUnitario'=>'required|numeric',
            'descuento'=>'required|numeric',
            'iva'=>'required|numeric',
            'estado'=>'required',
        ];
    }
}
