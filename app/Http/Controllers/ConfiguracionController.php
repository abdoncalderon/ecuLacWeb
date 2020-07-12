<?php

namespace App\Http\Controllers;

use App\Provincia;
use App\Ciudad;
use App\Sucursal;
use App\Categoria;
use App\Tipo;
use App\Presentacion;

class ConfiguracionController extends Controller
{
    public function index(){
        return view('configuracion.index');
    }
}
