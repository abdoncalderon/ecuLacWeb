@extends('layouts.external')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.cuenta')}}">{{ __('messages.myaccount') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.edit') }}</li>
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


    <article class="ventana">
        <div class="titulo">{{ __('content.edit') }} {{ __('messages.myaccount') }}</div>
        <div class="contenido">

            <div class="registro">

                {{-- DATOS --}}
                <div class="datos">
        
                    {{-- FORMULARIO --}}
                    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
                        @csrf
                        @method('PATCH')

                        {{-- NOMBRE COMPLETO --}}
                        <div class="form-group row">
                            <label for="nombreCompleto" class="col-md-4 col-form-label text-md-right">{{ __('content.fullname') }}</label>
    
                            <div class="col-md-6">
                                <input 
                                    id="nombreCompleto" 
                                    name="nombreCompleto" 
                                    type="text" 
                                    class="form-control @error('nombreCompleto') is-invalid @enderror" 
                                    value="{{ old('nombreCompleto',$cliente->nombreCompleto) }}" 
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

                        {{-- CEDULA --}}
                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('content.cardid') }}</label>
    
                            <div class="col-md-6">
                                <input 
                                    id="cedula" 
                                    name="cedula" 
                                    type="text" 
                                    class="form-control @error('cedula') is-invalid @enderror" 
                                    value="{{ old('cedula',$cliente->cedula) }}" 
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
                                    value="{{ old('email',$cliente->email) }}" 
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
                                    value="{{ old('telefono',$cliente->telefono) }}"
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
                        <div class="form-group">
                            
                            <div class="col-md-6" >
                            <input 
                                id="rol_id" 
                                name="rol_id" 
                                class="form-control" 
                                hidden 
                                type="text" 
                                value="{{ $cliente->usuario_id }}"> 
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
                                    class="form-control @error('usuario') text-lowercase is-invalid @enderror"
                                    value="{{ old('usuario',$cliente->usuario) }}" 
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
                                    <option value="">{{ __('messages.select') }} {{ __('content.city') }}</option>
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{$ciudad->id}}"  {{ $ciudad->id==$cliente->ciudad_id ? 'selected' : '' }}>{{$ciudad->nombre}}</option>
                                    @endforeach
                                </select>
        
                                @error('ciudad_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                    class="form-control @error('direccion') is-invalid @enderror" 
                                    value="{{ old('direccion', $cliente->direccion) }}" 
                                    required 
                                    autocomplete="usuario">
    
                                @error('dreccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        {{-- LATITUD --}}
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input 
                                id="latitud" 
                                name="latitud"
                                type="text" 
                                value="{{ old('lalitud', $cliente->latitud) }}" 
                                hidden
                                class="form-control @error('latitud') is-invalid @enderror">
                            </div>
                        </div>
    
                        {{-- LONGITUD --}}
                        <div class="form-group row">
    
                            <div class="col-md-6">
                                <input 
                                id="longitud"
                                name="longitud" 
                                type="text" 
                                value="{{ old('longitud', $cliente->longitud) }}" 
                                hidden
                                class="form-control @error('longitud') is-invalid @enderror">
                            </div>
                        </div>
                   
                        {{-- BOTONES --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 offset-sm-4">
                                <input class="btn btn-primary" type="submit" name="conUbicacion" value="{{ __('content.save') }} {{ __('messages.withLocation') }}">
                                <input class="btn btn-secondary" type="submit" name="sinUbicacion" value="{{ __('content.save') }} {{ __('messages.withoutLocation') }}">
                                <a class="btn btn-secondary" href="{{ route('clientes.cuenta') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
    
                    </form>

                </div>

                {{-- UBICACION --}}
                <div class="ubicacion">
                    <div id="map" class="mapa"></div>
                </div>

            </div>
            
        </div>
        
    </article>

@endsection

@section('script')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAx6CUd0YIGPfCwGUl0QTmc-axQ7G2z8c&callback=initMap">
    </script>
    <script>
        var map, infoWindow;
        function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 15
        });
        infoWindow = new google.maps.InfoWindow;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                document.getElementById('latitud').setAttribute('value',pos.lat);
                document.getElementById('longitud').setAttribute('value',pos.lng);

                infoWindow.setPosition(pos);

                infoWindow.setContent('Mi Ubicacion');

                infoWindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
                });
                } else {
                    handleLocationError(false, infoWindow, map.getCenter());
                    }
                }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                'Error: The Geolocation service failed.' :
                                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
    </script>
    
@endsection