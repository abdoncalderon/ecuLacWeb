<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UpdateCiudadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        $nombre = $this->get('nombre');
        
        $provincia_id = $this->get('provincia_id');
        
        $ciudades=DB::table('ciudades')->where([
            ['nombre','=',$nombre],
            ['provincia_id','=',$provincia_id],
            ])->get();

        if (count($ciudades)<1){
            return [
                'provincia_id'=>'required',
            ];
        }else{
            return [
                'provincia_id'=>'size:0',
            ];
        }
    }

    public function messages()
    {
        return [
            'provincia_id.size' => __('messages.exists'),
        ];
    }
    
}
