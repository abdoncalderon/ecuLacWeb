<?php

namespace App\Http\Controllers;

use App\Provincia;
use App\Ciudad;
use App\Http\Requests\StoreProvinciaRequest;

class ProvinciaController extends Controller
{
    public function index(){
        $provincias = Provincia::where('id','!=','0')->paginate(10);
        return view('provincias.index',compact('provincias'));
    }

    public function create(){
        return view('provincias.create');
    }

    public function store(StoreProvinciaRequest $request){
        Provincia::create($request->validated());
        return redirect()->route('provincias.index');
    }

    public function destroy($id){
        $provincia=Provincia::find($id);
        $ciudades=Ciudad::where('provincia_id',$provincia->id)->get();
        if (count($ciudades)>0){
            return back()->withErrors(__('messages.isFather'));
        }else{
            $provincia->delete();
            return redirect()->route('provincias.index');
        }
    }
}
