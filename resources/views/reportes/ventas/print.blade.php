@extends('layouts.print')

@section('contenidoPrincipal')
    <div class="reporte">
        <div class="cabecera">
            <img class="logo" src="{{ asset('img/logos/ecolac2.png') }}"  alt="">
            <div class="detalles">
                <div class="titulo">{{ __('messages.salesReport')}}</div>
                <div class="linea">{{ __('content.from')}}: {{ date($desde) }}</div>
                <div class="linea">{{ __('content.To')}}: {{ date($hasta) }}</div>
                <div class="linea">{{ __('content.user')}}: {{ auth()->user()->nombreCompleto }}</div>
                <div class="linea">{{ __('content.date')}}: {{ auth()->user()->nombreCompleto }}</div>
            </div>
        </div>
        <div class="contenido">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>{{ __('content.date') }}</th>
                        <th>{{ __('content.client') }}</th>
                        <th>{{ __('content.invoice') }}</th>
                        <th>{{ __('content.subtotal') }}</th>
                        <th>{{ __('content.discount') }}</th>
                        <th>{{ __('content.tax') }}</th>
                        <th>Total</th>
                        <th>{{ __('messages.payments') }}</th>
                        <th>{{ __('content.status') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturas as $factura)
                        <tr>
                            <td>{{ $factura->fecha }}</td>
                            <td>{{ $factura->pedido->cliente->user->nombreCompleto }}</td>
                            <td>{{ sprintf('%08d',$factura->id) }}</td>
                            <td>{{ number_format($factura->subtotal,2) }}</td>
                            <td>{{ number_format($factura->valorDescuento,2) }}</td>
                            <td>{{ number_format($factura->valorIva,2) }}</td>
                            <td>{{ number_format($factura->pedido->total(),2) }}</td>
                            <td>{{ $factura->tipoPago }}</td>
                            <td>{{ $factura->estado }}</td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pie">
            <div class="resumen">
                <div class="linea">Total: {{ __('content.currency') }} {{ $totalVentas }}</div>
                <div class="linea">{{ __('content.quantity')}}: {{ $cantidadVentas }}</div>
            </div>
        </div>
        
    </div>
@endsection