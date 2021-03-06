@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categorias.index')}}">{{ __('content.categories') }}</a></li>
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
        <div class="titulo">{{ __('content.add') }}  {{ __('content.category') }}</div>
            <div class="contenido">

                {{-- FORMULARIO --}}
                <div class="formulario">
                    <form method="POST" action="{{ route('categorias.store') }}" enctype="multipart/form-data">
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
                                    placeholder="Nombre Categoria"
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

                        {{-- DESCRIPCION --}}
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('content.description') }}</label>
                            <div class="col-md-6">
                                <textarea
                                    id="descripcion" 
                                    name="descripcion" 
                                    maxlength="255" 
                                    class="form-control @error('contenido') is-invalid @enderror" 
                                    required
                                    placeholder="Descripción"
                                    autofocus></textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- IMAGEN --}}
                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('content.image') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="imagen" 
                                    name="imagen" 
                                    type="file" 
                                    class="form-control-file @error('nombre') is-invalid @enderror" 
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
                                <button type="submit" class="btn btn-primary">{{ __('content.save') }}</button>
                                <a class="btn btn-secondary" href="{{ route('categorias.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection