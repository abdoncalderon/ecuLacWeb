@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('presentaciones.index')}}">{{ __('content.presentations') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.edit') }} </li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')

    <div class="ventana">
        <div class="titulo">{{ __('content.edit') }}  {{ __('content.presentation') }}</div>
            <div class="contenido">

                {{-- FORMULARIO --}}
                <div class="formulario">
                    <form method="POST" action="{{ route('presentaciones.update',$presentacion) }}">
                        @csrf
                        @method('PATCH')

                        {{-- CATEGORIA --}}
                        <div class="form-group row">
                            <label for="categoria_id" class="col-md-4 col-form-label text-md-right">{{ __('content.category') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="categoria_id"
                                    name="categoria_id" 
                                    class="form-control"
                                    required>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}" {{ $categoria->id==$presentacion->categoria_id ? 'selected':'' }}>{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- ENVASE --}}
                        <div class="form-group row">
                            <label for="envase" class="col-md-4 col-form-label text-md-right">{{ __('content.container') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="envase"
                                    name="envase" 
                                    class="form-control"
                                    required>
                                    @foreach ($envases as $clave => $valor)
                                        <option value="{{$valor}}" {{ $valor==$presentacion->envase ? 'selected':'' }}>{{$valor}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- CONTENIDO --}}
                        <div class="form-group row">
                            <label for="contenido" class="col-md-4 col-form-label text-md-right">{{ __('content.content') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="contenido" 
                                    name="contenido" 
                                    type="text" 
                                    maxlength="4" 
                                    class="form-control @error('contenido') is-invalid @enderror" 
                                    value="{{ old('contenido', $presentacion->contenido) }}" 
                                    required 
                                    autocomplete="contenido" 
                                    placeholder="0000"
                                    autofocus>

                                @error('contenido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- MEDIDA --}}
                        <div class="form-group row">
                            <label for="medida" class="col-md-4 col-form-label text-md-right">{{ __('content.measurement') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="medida"
                                    name="medida" 
                                    class="form-control"
                                    required>
                                    @foreach ($medidas as $clave => $valor)
                                        <option value="{{$valor}}" {{ $valor==$presentacion->medida ? 'selected':'' }}>{{$valor}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- BOTONES --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">{{ __('content.update') }}</button>
                                <a class="btn btn-secondary " href="{{ route('presentaciones.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection