<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'nombreCompleto'=>'required',
            'cedula'=>'required|max:10|unique:users',
            'telefono'=>'required|max:15',
            'email'=>'required|unique:users',
            'rol_id'=>'required',
            'usuario'=>'required|max:50|unique:users',
            'password'=>'required|confirmed|min:8',
        ];
    }
}
