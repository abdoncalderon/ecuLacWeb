@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index')}}">{{ __('content.users') }}</a></li>
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
        <div class="titulo">{{ __('content.add') }}  {{ __('content.users') }}</div>
        <div class="contenido">
            
            {{-- FORMULARIO --}}

            <form method="POST" action="{{ route('usuarios.store') }}">
                @csrf

                {{-- NOMBRE COMPLETO --}}
                <div class="form-group row">
                    <label for="nombreCompleto" class="col-md-4 col-form-label text-md-right">{{ __('content.fullname') }}</label>
                    <div class="col-md-6">
                        <input 
                            id="nombreCompleto" 
                            name="nombreCompleto" 
                            type="text" 
                            class="form-control @error('nombreCompleto') is-invalid @enderror" 
                            value="{{ old('nombreCompleto') }}" 
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


                {{-- CEDULA --}}
                <div class="form-group row">
                    <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('content.cardid') }}</label>
                    <div class="col-md-6">
                        <input 
                            id="cedula" 
                            name="cedula" 
                            type="text" 
                            class="form-control @error('cedula') is-invalid @enderror" 
                            value="{{ old('cedula') }}" 
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

                {{-- EMAIL --}}
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('content.emailaddress') }}</label>

                    <div class="col-md-6">
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" 
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


                {{-- TELEFONO --}}
                <div class="form-group row">
                    <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('content.phone') }}</label>

                    <div class="col-md-6">
                        <input 
                            id="telefono" 
                            name="telefono"
                            type="text" 
                            class="form-control @error('telefono') is-invalid @enderror" 
                            value="{{ old('telefono') }}"
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

                {{-- ROL --}}
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
                                <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                            @endforeach
                        </select>

                        @error('rol_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>
                </div>

                {{-- USUARIO --}}
                <div class="form-group row">
                    <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('content.user') }}</label>
                    <div class="col-md-6">
                        <input 
                            id="usuario" 
                            name="usuario" 
                            type="text" 
                            class="form-control @error('usuario') lowercase is-invalid @enderror"
                            value="{{ old('usuario') }}" 
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


                {{-- PASSWORD --}}
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('content.password') }}</label>
                    <div class="col-md-6">
                        <input 
                            id="password" 
                            name="password"
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            required 
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- CONFIRMAR PASSWORD --}}
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('content.confirmpassword') }}</label>
                    <div class="col-md-6">
                        <input 
                            id="password-confirm"
                            name="password_confirmation" 
                            type="password" 
                            class="form-control" 
                            required 
                            autocomplete="new-password">
                    </div>
                </div>
                
                {{-- BOTONES --}}
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