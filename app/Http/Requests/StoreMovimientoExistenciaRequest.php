<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovimientoExistenciaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'fecha'=>'required',
            'usuario_id'=>'required',
            'producto_id'=>'required',
            'sucursal_id'=>'required',
            'tipoMovimiento'=>'required',
            'cantidad'=>'required|numeric',
        ];
    }
}
