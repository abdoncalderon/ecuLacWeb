@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('provincias.index')}}">{{ __('content.provinces') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.add') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')

    {{-- MENSAJES DE ERROR --}}
    <div class="ventana">
        <div class="titulo">{{ __('content.add') }}  {{ __('content.province') }}</div>
            <div class="contenido">

                {{-- FORMULARIO --}}
                <div class="formulario">
                    <form method="POST" action="{{ route('provincias.store') }}">
                        @csrf
                        
                        {{-- NOMBRE --}}
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
                                    autofocus>
                                @error('nombre')
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
                                <a class="btn btn-secondary " href="{{ route('provincias.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
