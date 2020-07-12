<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UpdatePresentacionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        $categoria_id = $this->get('categoria_id');

        $envase = $this->get('envase');

        $medida = $this->get('medida');

        $contenido = $this->get('contenido');
        
        $presentaciones=DB::table('presentaciones')->where([
            ['categoria_id','=',$categoria_id],
            ['envase','=',$envase],
            ['medida','=',$medida],
            ['contenido','=',$contenido],
            ])->get();

        if (count($presentaciones)<1){
            return [
                'categoria_id'=>'required',
                'envase'=>'required',
                'contenido'=>'required|numeric',
                'medida'=>'required',
            ];
        }else{
            return [
                'categoria_id'=>'size:0',
                'envase'=>'max:0',
            ];
        }
    }

    public function messages()
    {
        return [
            'envase.max' => __('messages.exists'),
            'categoria_id.size' => __('messages.exists'),
        ];
    }

}
