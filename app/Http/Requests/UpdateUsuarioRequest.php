<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'nombreCompleto'=>'required',
            'cedula'=>'required|max:10',
            'telefono'=>'required|max:15',
            'email'=>'required|email',
            'rol_id'=>'required',
            'usuario'=>'required|max:50',
        ];
    }
}
