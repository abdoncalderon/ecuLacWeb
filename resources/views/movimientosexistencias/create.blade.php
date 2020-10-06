@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('productos.index')}}">{{ __('content.products') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('movimientosexistencias.index',$producto)}}">{{ __('content.move').' '.__('content.stock') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.add') }}</li>
            </ol>
        </nav>
    </div>
@endsection


@section('contenidoPrincipal')

    {{-- MENSAJES DE ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $errors->first() }}
        </div>
    @endif
    
    <div class="ventana">

        {{-- AGREGAR MOVIMIENTO DE STOCK --}}
        <div class="titulo">
            {{ __('content.add').' '.__('content.move').' '.__('content.stock')}}
        </div>
        <div class="contenido">

            {{-- FORMULARIO --}}
            <div class="formulario">
                <form method="POST" action="{{ route('movimientosexistencias.store') }}">
                    @csrf

                    {{-- FECHA --}}
                    <input 
                        id="fecha" 
                        name="fecha" 
                        value="{{ Carbon\Carbon::now()->toDateTimeString() }}" 
                        hidden
                    >

                    {{-- USUARIO --}}
                    <input 
                        id="usuario_id" 
                        name="usuario_id" 
                        value="{{ auth()->id() }}" 
                        hidden
                    >

                    {{-- ID PRODUCTO --}}
                    <input 
                        id="producto_id" 
                        name="producto_id" 
                        value="{{ $producto->id }}" 
                        hidden
                    >

                    {{-- NOMBRE PRODUCTO --}}
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('content.product') }}</label>
                        <div class="col-md-6">
                            <input 
                                id="nombre" 
                                name="nombre" 
                                type="text" 
                                maxlength="50" 
                                class="form-control @error('nombre') is-invalid @enderror" 
                                value="{{ old('nombre', $producto->nombre)  }}" 
                                required 
                                disabled
                                autocomplete="nombre" .\
                                placeholder="Nombre Sucursal"
                                autofocus>

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- SUCURSAL --}}
                    <div class="form-group row">
                        <label for="sucursal_id" class="col-md-4 col-form-label text-md-right">{{ __('content.office') }}</label>
                        <div class="col-md-6">
                            <select 
                                id="sucursal_id"
                                name="sucursal_id" 
                                class="form-control"
                                required
                                autofocus>
                                <option value="">{{ __('messages.select') }} {{ __('content.office') }}</option>
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                @endforeach
                            </select>
    
                            @error('sucursal_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>
                    </div>

                    {{-- CANTIDAD ANTERIOR --}}
                    <div class="form-group row">
                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('content.quantity').' '.__('content.previous') }}</label>
                        <div class="col-md-6">
                            <input 
                                type="text" 
                                class="form-control"
                                value="{{ $producto->existenciaActual }}"
                                disabled
                            >
                        </div>
                    </div>

                    {{-- NUEVA CANTIDAD --}}
                    <div class="form-group row">
                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('content.new').' '.__('content.quantity') }}</label>
                        <div class="col-md-6">
                            <input 
                                id="cantidad" 
                                name="cantidad" 
                                type="number" 
                                min="1" 
                                class="form-control @error('nombre') is-invalid @enderror" 
                                required 
                                autofocus>

                            @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- BOTONES --}}
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary ">{{ __('content.save') }}</button>
                            <a class="btn btn-secondary " href="{{ route('productos.index') }}">{{ __('content.cancel') }}</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection