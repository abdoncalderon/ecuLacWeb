@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categorias.index')}}">{{ __('content.categories') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.edit') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')
    <div class="ventana">
        <div class="titulo">{{ __('content.edit') }}  {{ __('content.category') }}</div>
            <div class="contenido">
                <div class="formulario">
                    <form method="POST" action="{{ route('categorias.update',$categoria) }}" enctype="multipart/form-data">
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
                                    class="form-control @error('nombre') is-invalid @enderror" 
                                    value="{{ old('nombre',$categoria->nombre) }}" 
                                    disabled
                                    autocomplete="nombre" 
                                    autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('content.description') }}</label>
                            <div class="col-md-6">
                                <textarea
                                    id="descripcion" 
                                    name="descripcion" 
                                    maxlength="255" 
                                    class="form-control @error('contenido') is-invalid @enderror" 
                                    required
                                    autofocus>{{ old('descripcion',$categoria->descripcion) }}</textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('content.image') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="imagen" 
                                    name="imagen" 
                                    type="file" 
                                    class="form-control-file @error('nombre') is-invalid @enderror" 
                                    value="{{ old('imagen',$categoria->imagen) }}"
                                    autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="categoria-imagen" style="background-image: url({{ asset('img/categorias/'.$categoria->imagen)}});"></div>
                            

                        <div class="form-group row">
                            <label for="estaActivo" class="col-md-4 col-form-label text-md-right">{{ __('content.active') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="estaActivo" 
                                    name="estaActivo" 
                                    type="checkbox"
                                    @if($categoria->estaActivo==1)
                                        checked
                                    @endif>
                                @error('estaActivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('content.update') }}</button>
                                <a class="btn btn-secondary" href="{{ route('categorias.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection