<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UpdateTipoRequest extends FormRequest
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
                'categoria_id'=>'required',
            ];
        }else{
            return [
                'categoria_id'=>'size:0',
            ];
        }
    }

    public function messages()
    {
        return [
            'categoria_id.size' => __('messages.exists'),
        ];
    }
}