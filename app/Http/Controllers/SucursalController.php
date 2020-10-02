<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Sucursal;
use App\MovimientoExistencia;

use App\Http\Requests\StoreSucursalRequest;
use App\Http\Requests\UpdateSucursalRequest;

class SucursalController extends Controller
{
    /*************************************************************************************************************************/
    public function index(){
        $sucursales = Sucursal::where('id','!=','0')->paginate(10);
        return view('sucursales.index',compact('sucursales'));
    }
    
    /*************************************************************************************************************************/
    public function create()
    {
        $ciudades=Ciudad::all();
        return view('sucursales.create',compact('ciudades'));
    }

    /*************************************************************************************************************************/
    public function store(StoreSucursalRequest $request )
    {
        Sucursal::create($request->validated());
        return redirect()->route('sucursales.index');
    }

    /*************************************************************************************************************************/
    public function edit(sucursal $sucursal)
    {
        $ciudades = Ciudad::all();
        return view('sucursales.edit',[
            'sucursal'=>$sucursal
            ])
        ->with(compact('ciudades'));
    }

    /*************************************************************************************************************************/
    public function update(UpdateSucursalRequest $request, Sucursal $sucursal)
    {
        $sucursal->update($request->validated());
        return redirect()->route('sucursales.index');
    }

    /*************************************************************************************************************************/
    public function destroy($id)
    {
        $sucursal=Sucursal::find($id);
        $movimientosExistencias=MovimientoExistencia::where('sucursal_id',$sucursal->id)->get();
        if (count($movimientosExistencias)>0){
            return back()->withErrors(__('messages.isFather'));
        }else{
            $sucursal->delete();
            return redirect()->route('sucursales.index');
        }
    }
}
