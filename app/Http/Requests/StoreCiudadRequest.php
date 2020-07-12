<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreCiudadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        $nombre = $this->get('nombre');
        
        $provincia_id = $this->get('provincia_id');
        
        $ciudades=DB::table('Ciudades')->where([
            ['nombre','=',$nombre],
            ['provincia_id','=',$provincia_id],
            ])->get();

        if (count($ciudades)<1){
            return [
                'nombre'=>'required',
                'provincia_id'=>'required',
            ];
        }else{
            return [
                'nombre'=>'max:0',
                'provincia_id'=>'size:0',
            ];
        }
        
    }

    public function messages()
    {
        return [
            'nombre.max' => __('messages.exists'),
            'provincia_id.size' => __('messages.exists'),
        ];
    }
   
}
