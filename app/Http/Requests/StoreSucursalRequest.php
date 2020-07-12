<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSucursalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'nombre'=>'required|max:50|unique:sucursales',
            'ciudad_id'=>'required',
            'direccion'=>'required|max:255',
            'telefono'=>'required|min:9|max:15',

        ];
    }
    
}
