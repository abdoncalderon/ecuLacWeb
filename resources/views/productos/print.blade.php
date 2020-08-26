@extends('layouts.print')

@section('contenidoPrincipal')
    <div class="reporte">
        <div class="cabecera">
            <img class="logo" src="{{ asset('img/logos/ecolac2.png') }}"  alt="">
            <div class="detalles">
                <div class="titulo">{{ __('messages.productsReport')}}</div>
                <div class="linea">{{ __('content.date')}}: {{ Carbon\Carbon::now()->toDateString() }}</div>
                <div class="linea">{{ __('content.date')}}: {{ auth()->user()->nombreCompleto }}</div>
                <div class="linea">{{ __('content.date')}}: {{ auth()->user()->nombreCompleto }}</div>
            </div>
        </div>
        <div class="contenido">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>{{ __('content.name') }}</th>
                        <th>{{ __('content.category') }}/{{ __('content.type') }}/{{ __('content.presentation') }}</th>
                        <th>{{ __('content.price') }}</th>
                        <th>{{ __('content.discount') }} %</th>
                        <th>{{ __('content.tax') }} %</th>
                        <th>{{ __('content.stock') }}</th>
                        <th>{{ __('content.highLights') }}</th>
                        <th>{{ __('content.status') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->categoria($producto->categoria_id) }} / {{ $producto->tipo($producto->tipo_id) }} / {{ $producto->presentacion($producto->presentacion_id) }}</td>
                            <td>{{ $producto->precioUnitario }}</td>
                            <td>{{ $producto->descuento }}</td>
                            <td>{{ $producto->iva }}</td>
                            <td>{{ $producto->existenciaActual }}</td>
                            <td>{{ $producto->esDestacado == true ? 'Destacado' : '' }}</td>
                            <td>{{ $producto->estado }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pie">
            <div class="resumen">

            </div>
        </div>
        
    </div>
@endsection

