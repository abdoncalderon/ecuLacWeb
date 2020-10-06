@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.location') }} {{ __('content.client') }} </li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')
                        
    {{-- UBICACION CLIENTE --}}
    <div class="ventana">
        <div class="titulo">
            {{ __('content.location') }} {{ __('content.client') }} - {{ $cliente->nombreCompleto }}
        </div>
        <div class="contenido">
            <div class="ubicacion">

                {{-- MAPA DE GOOGLE --}}
                <div id="map" class="mapa"></div>

                {{--DATOS CLIENTE --}}
                <div class="direccion">
                    <label class="etiqueta" for="cliente">{{ __('content.client') }}:</label>
                    <input class="dato" type="text" id="cliente" name="cliente" disabled value="{{ $cliente->nombreCompleto }}">
                    <label class="etiqueta" for="direccion">{{ __('content.address') }}:</label>
                    <input class="dato" type="text" id="direccion" name="direccion" disabled value="{{ $cliente->direccion }}">
                    <label class="etiqueta" for="telefono">{{ __('content.phone') }}:</label>
                    <input class="dato" type="text" id="telefono" name="telefono" disabled value="{{ $cliente->telefono }}">
                    <label class="etiqueta" for="email">{{ __('content.emailaddress') }}:</label>
                    <input class="dato" type="text" id="email" name="email" disabled value="{{ $cliente->email }}">
                    <input class="dato" type="text" id="latitud" name="latitud" hidden value="{{ $cliente->latitud }}">
                    <input class="dato" type="text" id="longitud" name="longitud" hidden value="{{ $cliente->longitud }}">
                    
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAx6CUd0YIGPfCwGUl0QTmc-axQ7G2z8c&callback=initMap">
    </script>
    <script>
        var map, infoWindow;
        var latitud = document.getElementById('latitud').getAttribute('value');
        var longitud = document.getElementById('longitud').getAttribute('value');
        var cliente = document.getElementById('cliente').getAttribute('value');
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -0.1703514304342444, lng: -78.4762883331316},
                zoom: 15
            });
            ubicacion = new google.maps.LatLng(latitud,longitud);
            infoWindow = new google.maps.InfoWindow({
                map: map,
                position: ubicacion,
                content: cliente,
            });
            map.setCenter(ubicacion);
        }   
    </script>
@endsection
