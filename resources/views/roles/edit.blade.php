@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index')}}">{{ __('content.roles') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.edit') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')
    <div class="ventana">
        <div class="titulo">{{ __('content.edit') }}  {{ __('content.role') }}</div>
            <div class="contenido">
                <div class="formulario">
                    <form method="POST" action="{{ route('roles.update',$rol) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('content.name') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="nombre" 
                                    name="nombre" 
                                    type="text" 
                                    maxlength="50"  
                                    class="form-control text-uppercase @error('nombre') is-invalid @enderror" 
                                    value="{{ old('nombre',$rol->nombre) }}" 
                                    autocomplete="nombre" 
                                    disabled
                                    autofocus>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="esExterno" class="col-md-4 col-form-label text-md-right">{{ __('content.external') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="esExterno" 
                                    name="esExterno" 
                                    type="checkbox"
                                    @if($rol->esExterno==1)
                                        checked
                                    @endif>
                                @error('esExterno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">{{ __('content.save') }}</button>
                                <a class="btn btn-secondary " href="{{ route('roles.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


