@extends('layouts.auth')

@section('section')

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $errors->first() }}
        </div>
    @endif

    <div class="auth">

        <div class="ventana">
            <div class="titulo">{{ __('content.register').' '.__('content.clients') }}</div>

            <div class="contenido">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nombreCompleto" class="col-md-4 col-form-label text-md-right">{{ __('content.fullname') }}</label>

                        <div class="col-md-6">
                            <input 
                                id="nombreCompleto" 
                                name="nombreCompleto" 
                                type="text" 
                                class="form-control @error('nombreCompleto') is-invalid @enderror" 
                                value="{{ old('nombreCompleto') }}" 
                                maxlength="255"
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

                    <div class="form-group">
                        
                        <div class="col-md-6" >
                        <input 
                            id="rol_id" 
                            name="rol_id" 
                            class="form-control" 
                            hidden 
                            type="text" 
                            value="{{ $clienteId }}"> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('content.user') }}</label>

                        <div class="col-md-6">
                            <input 
                                id="usuario" 
                                name="usuario" 
                                type="text" 
                                class="form-control @error('usuario') text-lowercase is-invalid @enderror"
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

                    <div class="form-group row">
                        <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('content.city') }}</label>
                        <div class="col-md-6">
                            <select 
                                id="ciudad_id"
                                name="ciudad_id" 
                                class="form-control"
                                placeholder="Ciudad"
                                required>
                                <option value="">{{ __('messages.select') }} {{ __('content.city') }}</option>
                                @foreach ($ciudades as $ciudad)
                                    <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                @endforeach
                            </select>
    
                            @error('ciudad_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('content.address') }}</label>

                        <div class="col-md-6">
                            <input 
                                id="direccion" 
                                name="direccion"
                                type="text" 
                                class="form-control @error('direccion') is-invalid @enderror" 
                                value="{{ old('direccion') }}" 
                                required 
                                autocomplete="usuario">

                            @error('dreccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="latitud" class="col-md-4 col-form-label text-md-right">{{ __('content.latitude') }}</label>

                        <div class="col-md-6">
                            <input 
                            id="latitud" 
                            name="latitud"
                            hidden 
                            type="text" 
                            class="form-control @error('latitud') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="longitud" class="col-md-4 col-form-label text-md-right">{{ __('content.longitude') }}</label>

                        <div class="col-md-6">
                            <input 
                            id="longitud"
                            name="longitud" 
                            hidden
                            type="text" 
                            class="form-control @error('longitud') is-invalid @enderror">
                        </div>
                    </div> --}}

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('content.save') }}</button>
                            <button type="button" id="ubicacion" class="btn btn-secondary btn-lg">{{ __('content.location') }}</button>
                            <a class="btn btn-secondary btn-lg" href="{{ route('home') }}">{{ __('content.cancel') }}</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
