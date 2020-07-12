<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'nombre'=>'required|max:50|unique:categorias',
            'descripcion'=>'required|max:255',
        ];
    }

    
}
