<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fechaCreacion'=>'date_format:Y-m-d H:i:s',
            'cliente_id'=>'required',
            'vendedor_id'=>'required',
        ];
    }
}
