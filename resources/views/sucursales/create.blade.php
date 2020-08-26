@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sucursales.index')}}">{{ __('content.offices') }}</a></li>
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
        <div class="titulo">{{ __('content.add') }}  {{ __('content.office') }}</div>
            <div class="contenido">

                {{-- FORMULARIO --}}
                <div class="formulario">
                    <form method="POST" action="{{ route('sucursales.store') }}">
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
                                    placeholder="Nombre Sucursal"
                                    autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- CIUDAD --}}
                        <div class="form-group row">
                            <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('content.city') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="ciudad_id"
                                    name="ciudad_id" 
                                    class="form-control"
                                    placeholder="Ciudad"
                                    required>

                                @foreach ($ciudades as $ciudad)
                                    <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- DIRECCION --}}
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('content.address') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="direccion" 
                                    name="direccion" 
                                    type="text" 
                                    maxlength="255" 
                                    class="form-control @error('direccion') is-invalid @enderror" 
                                    value="{{ old('direccion') }}" 
                                    required 
                                    placeholder="Dirección"
                                    autofocus>

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        {{-- TELEFONO --}}
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('content.phone') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="telefono" 
                                    name="telefono"
                                    type="text" 
                                    maxlength="15" 
                                    class="form-control @error('telefono') is-invalid @enderror" 
                                    value="{{ old('telefono') }}" 
                                    required 
                                    placeholder="Teléfono"
                                    autofocus>

                                @error('telefono')
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
                                <a class="btn btn-secondary " href="{{ route('sucursales.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection