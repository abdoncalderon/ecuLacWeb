@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index')}}">{{ __('content.users') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.edit') }}</li>
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
        <div class="titulo">{{ __('content.edit') }}  {{ __('content.user') }} - {{ $usuario->nombreCompleto }}</div>
        <div class="contenido">

            <form method="POST" action="{{ route('usuarios.update',$usuario) }}">
                @csrf
                @method('PATCH')
                <div class="form-group row">
                    <label for="nombreCompleto" class="col-md-4 col-form-label text-md-right">{{ __('content.fullname') }}</label>

                    <div class="col-md-6">
                        <input 
                            id="nombreCompleto" 
                            name="nombreCompleto" 
                            type="text" 
                            class="form-control @error('nombreCompleto') is-invalid @enderror" 
                            value="{{ old('nombreCompleto',$usuario->nombreCompleto) }}" 
                            maxlength="255";
                            required 
                            autocomplete="nombreCompleto" 
                            autofocus>

                        @error('nombreCompleto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('content.cardid') }}</label>

                    <div class="col-md-6">
                        <input 
                            id="cedula" 
                            name="cedula" 
                            type="text" 
                            class="form-control @error('cedula') is-invalid @enderror" 
                            value="{{ old('cedula',$usuario->cedula) }}" 
                            maxlength="10"
                            required 
                            autocomplete="cedula" 
                            autofocus>

                        @error('cedula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('content.emailaddress') }}</label>

                    <div class="col-md-6">
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email',$usuario->email) }}" 
                            maxlength="255"
                            required 
                            autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('content.phone') }}</label>

                    <div class="col-md-6">
                        <input 
                            id="telefono" 
                            name="telefono"
                            type="text" 
                            class="form-control @error('telefono') is-invalid @enderror" 
                            value="{{ old('telefono',$usuario->telefono) }}"
                            maxlength="15"
                            required 
                            autocomplete="telefono">

                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rol_id" class="col-md-4 col-form-label text-md-right">{{ __('content.role') }}</label>
                    <div class="col-md-6">
                        <select 
                            id="rol_id"
                            name="rol_id" 
                            class="form-control"
                            placeholder="Rol"
                            required>
                            <option value="">{{ __('messages.select') }} {{ __('content.role') }}</option>
                            @foreach ($roles as $rol)
                                <option value="{{$rol->id}}" {{ $rol->id==$usuario->rol_id ? 'selected' : '' }}>{{$rol->nombre}}</option>
                            @endforeach
                        </select>

                        @error('rol_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('content.user') }}</label>

                    <div class="col-md-6">
                        <input 
                            id="usuario" 
                            name="usuario" 
                            type="text" 
                            class="form-control @error('usuario') lowercase is-invalid @enderror"
                            value="{{ old('usuario',$usuario->usuario) }}" 
                            maxlength="50"
                            required 
                            autocomplete="usuario">

                        @error('usuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary ">{{ __('content.save') }}</button>
                        <a class="btn btn-secondary " href="{{ route('usuarios.index') }}">{{ __('content.cancel') }}</a>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    

@endsection