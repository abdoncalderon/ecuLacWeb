@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ciudades.index')}}">{{ __('content.cities') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.add') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')
    <div class="ventana">
        <div class="titulo">{{ __('content.add') }}  {{ __('content.city') }}</div>
            <div class="contenido">
                <div class="formulario">
                    <form method="POST" action="{{ route('ciudades.store') }}">
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
                                    placeholder="Nombre Ciudad"
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

                        <div class="form-group row">
                            <label for="provincia_id" class="col-md-4 col-form-label text-md-right">{{ __('content.province') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="provincia_id"
                                    name="provincia_id" 
                                    class="form-control"
                                    placeholder="Provincia"
                                    required>
                                    @foreach ($provincias as $provincia)
                                        <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">{{ __('content.save') }}</button>
                                <a  class="btn btn-secondary " href="{{ route('ciudades.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection