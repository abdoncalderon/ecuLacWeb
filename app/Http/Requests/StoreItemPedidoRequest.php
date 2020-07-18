<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemPedidoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'cliente_id'=>'required|numeric',
            'producto_id'=>'required|numeric|exists:productos,id',
            'cantidad'=>'required|numeric',
        ];
    }
}
