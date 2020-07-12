                
                
@extends('layouts.external')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.myaccount') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')

        <article class="ventana">

            <div class="titulo">
                {{ __('messages.myaccount') }}
            </div>
            
            <div class="contenido">

                <div class="cuenta">

                    <div class="datos">

                        <div class="form-group">
                            <div class="col-md-6" >
                            <input 
                                id="rol_id" 
                                name="rol_id" 
                                class="form-control" 
                                hidden 
                                type="text" 
                                value="{{ $cliente->id }}"> 
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="nombreCompleto" class="col-md-4 col-form-label text-md-right">{{ __('content.fullname') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="nombreCompleto" 
                                    name="nombreCompleto" 
                                    type="text" 
                                    class="form-control" 
                                    disabled
                                    value="{{ $cliente->nombreCompleto }}" 
                                >
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('content.cardid') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="cedula" 
                                    name="cedula" 
                                    type="text" 
                                    class="form-control" 
                                    disabled
                                    value="{{ $cliente->cedula }}" 
                                >
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('content.emailaddress') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="email" 
                                    name="email" 
                                    type="text" 
                                    class="form-control" 
                                    disabled
                                    value="{{ $cliente->email }}" 
                                >
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('content.phone') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="telefono" 
                                    name="telefono"
                                    type="text" 
                                    class="form-control" 
                                    disabled
                                    value="{{ $cliente->telefono }}"
                                >
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('content.user') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="usuario" 
                                    name="usuario" 
                                    type="text" 
                                    class="form-control"
                                    disabled
                                    value="{{ $cliente->usuario }}" 
                                >
                            </div>
                        </div>
                        
            
                        <div class="form-group row">
                            <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('content.city') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="ciudad_id"
                                    name="ciudad_id" 
                                    type="text" 
                                    class="form-control"
                                    disabled
                                    value="{{ $cliente->ciudad }}"
                                >
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('content.address') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="direccion" 
                                    name="direccion"
                                    type="text" 
                                    class="form-control" 
                                    disabled
                                    value="{{ $cliente->direccion }}" 
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('content.active') }} {{ __('content.since') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="direccion" 
                                    name="direccion"
                                    type="text" 
                                    class="form-control" 
                                    disabled
                                    value="{{ Carbon\Carbon::parse($cliente->creadoEn)->format('d M Y') }}" 
                                >
                            </div>
                        </div>
    
                    </div>
                    <div class="acciones">
                        <a class="accion" href="#">{{ __('content.edit') }} {{ __('content.profile') }}</a>
                        <a class="accion" href="#">{{ __('messages.payments') }}</a>
                        <a class="accion" href="{{ route('clientes.historial') }}">{{ __('messages.myorders') }}</a>
                    </div>
                </div>

                

               
            </div>
            
        </article>
            

        <aside class="opciones">

        </aside>

    </div>
@endsection