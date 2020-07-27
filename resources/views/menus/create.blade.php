@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('menus.index')}}">{{ __('content.menus') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.add') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ $errors->first() }}
    </div>
    @endif

    <div class="ventana">
        <div class="titulo">{{ __('content.add') }}  {{ __('content.menus') }}</div>
            <div class="contenido">
                <div class="formulario">
                    <form method="POST" action="{{ route('menus.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('content.name') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="nombre" 
                                    name="nombre" 
                                    type="text" 
                                    maxlength="50" 
                                    class="form-control @error('nombre') is-invalid @enderror" 
                                    value="{{ old('nombre') }}" 
                                    required 
                                    autocomplete="nombre" 
                                    placeholder="{{ __('content.name') }} Menu"
                                    autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="multilenguaje" class="col-md-4 col-form-label text-md-right">{{ __('content.code') }} {{ __('content.multilanguage') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="multilenguaje" 
                                    name="multilenguaje" 
                                    type="text" 
                                    maxlength="50" 
                                    class="form-control @error('multilenguaje') is-invalid @enderror" 
                                    value="{{ old('multilenguaje') }}" 
                                    autocomplete="multilenguaje" 
                                    placeholder="{{ __('content.code') }} {{ __('content.multilanguage') }}"
                                    autofocus>

                                @error('multilnguaje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="ruta" class="col-md-4 col-form-label text-md-right">{{ __('content.route') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="ruta" 
                                    name="ruta" 
                                    type="text" 
                                    maxlength="255" 
                                    class="form-control @error('ruta') is-invalid @enderror" 
                                    value="{{ old('ruta') }}" 
                                    required 
                                    autocomplete="ruta" 
                                    placeholder="Ruta Laravel"
                                    autofocus>

                                @error('ruta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="icono" class="col-md-4 col-form-label text-md-right">{{ __('content.image') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="icono" 
                                    name="icono" 
                                    type="file" 
                                    class="form-control-file @error('icono') is-invalid @enderror" 
                                    autofocus>

                                @error('icono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">{{ __('content.save') }}</button>
                                <a class="btn btn-secondary " href="{{ route('menus.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection