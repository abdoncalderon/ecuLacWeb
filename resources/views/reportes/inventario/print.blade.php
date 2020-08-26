@extends('layouts.print')

@section('contenidoPrincipal')
    <div class="reporte">
        <div class="cabecera">
            <img class="logo" src="{{ asset('img/logos/ecolac2.png') }}"  alt="">
            <div class="detalles">
                <div class="titulo">{{ __('messages.stockReport')}}</div>
                <div class="linea">{{ __('content.user')}}: {{ auth()->user()->nombreCompleto }}</div>
                <div class="linea">{{ __('content.date')}}: {{ auth()->user()->nombreCompleto }}</div>
                <div class="linea">{{ __('content.date')}}: {{ auth()->user()->nombreCompleto }}</div>
                <div class="linea">{{ __('content.date')}}: {{ auth()->user()->nombreCompleto }}</div>
            </div>
        </div>
        <div class="contenido">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>{{ __('content.code') }}</th>
                        <th>{{ __('content.name') }}</th>
                        <th>{{ __('content.price') }}</th>
                        <th>{{ __('content.stock') }}</th>
                        <th>{{ __('content.value') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ sprintf('%08d',$producto->id) }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td class="dinero">{{ __('content.currency') }} {{ $producto->precioUnitario }}</td>
                            <td>{{ $producto->existenciaActual }}</td>
                            <td class="dinero">{{ __('content.currency') }} {{ number_format($producto->existenciaActual * $producto->precioUnitario,2) }}</td>

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
