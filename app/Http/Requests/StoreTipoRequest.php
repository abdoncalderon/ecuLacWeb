<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreTipoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        $nombre = $this->get('nombre');
        
        $categoria_id = $this->get('categoria_id');
        
        $tipos=DB::table('tipos')->where([
            ['nombre','=',$nombre],
            ['categoria_id','=',$categoria_id],
            ])->get();

        if (count($tipos)<1){
            return [
                'nombre'=>'required',
                'categoria_id'=>'required',
            ];
        }else{
            return [
                'nombre'=>'max:0',
                'categoria_id'=>'size:0',
            ];
        }
    }

    public function messages()
    {
        return [
            'nombre.max' => __('messages.exists'),
            'categoria_id.size' => __('messages.exists'),
        ];
    }
}
