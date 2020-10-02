<?php

namespace App\Http\Controllers;

use App\Rol;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::guest()){
           return redirect()->route('tienda.vitrina');
        }else{
            if(Rol::esExterno(auth()->user()->rol_id)==1){
                return redirect()->route('tienda.vitrina');
            }else{
                return view('layouts.internal');
            }
        }
    }
    
}
