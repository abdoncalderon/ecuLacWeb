<?php

namespace App\Http\Middleware;
use App\User;
use App\MenuRol;
use Closure;

class Permisos
{
    
    public function handle($request, Closure $next)
    {
        $ruta = $request->route()->getName();
        if (! MenuRol::existe(auth()->user()->rol_id, $ruta)){
            return redirect('/');
        }
        return $next($request);
    }
}
