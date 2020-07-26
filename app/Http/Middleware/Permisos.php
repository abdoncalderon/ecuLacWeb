<?php

namespace App\Http\Middleware;
use App\User;
use App\MenuRol;
use Closure;

class Permisos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ruta = $request->route()->getName();
        if (! MenuRol::existe(auth()->user()->rol_id,$ruta)){
            return redirect('/');
        }
        return $next($request);
    }
}
