@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('reportes.index')}}">{{ __('content.reports') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.sales') }}</li>
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
   
    <div class='ventana'>
        
        <div class="titulo">{{ __('content.sales')}}</div>
        <div class="encabezado">
            <div class="resumen">
                <div class="cantidad">{{ __('content.quantity') }} {{ __('content.sales') }}: {{ $cantidadVentas }}</div>
                <div class="total"> Total {{ __('content.sales') }}: {{ $totalVentas }}</div>
            </div>
            <form method="GET" action="{{ route('reportes.ventas') }}">
                <div class="filtros">
                    <span class="boton">
                        <button class="btn btn-secondary" type="submit">{{ __('content.search') }}  {{ __('content.sales') }}</button>
                    </span>
                    <div class="etiqueta">{{ __('content.seller') }}</div>
                    <select class="select"  name="vendedor" id="vendedor">
                        <option value="">{{ __('content.all') }}</option>
                        @foreach ($vendedores as $vendedor)
                            <option value="{{ $vendedor->id }}">{{ $vendedor->nombreCompleto }}</option>
                        @endforeach
                    </select>
                    <div class="etiqueta">{{ __('content.from') }}</div>
                    <input class="date" type="date" id="desde" name="desde" value="{{ Carbon\Carbon::now()->toDateString() }}" min="1900-01-01" max="2999-12-31">
                    <div class="etiqueta">{{ __('content.To') }}</div>
                    <input class="date" type="date" id="hasta" name="hasta" value="{{ Carbon\Carbon::now()->toDateString() }}" min="1900-01-01" max="2999-12-31">
                </div>
            </form>
        </div>
        <div class="contenido">
            <div class="index">
                <div>
                    <span>
                    <a class="btn btn-success" href="#">{{ __('content.print') }}</a>
                    </span>
                </div>
                <div class="table-responsive">
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
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturas as $factura)
                                <tr>
                                    <td>{{ $factura->fecha }}</td>
                                    <td>{{ $factura->cliente($factura->pedido_id)->nombreCompleto }}</td>
                                    <td>{{ sprintf('%08d',$factura->id) }}</td>
                                    <td>{{ number_format($factura->subtotal,2) }}</td>
                                    <td>{{ number_format($factura->valorDescuento,2) }}</td>
                                    <td>{{ number_format($factura->valorIva,2) }}</td>
                                    <td>{{ number_format($factura->pedido($factura->pedido_id)->total($factura->pedido($factura->pedido_id)),2) }}</td>
                                    <td>{{ $factura->tipoPago }}</td>
                                    <td>{{ $factura->estado }}</td>
                                    <td>
                                        <a class="accion" href="#">{{ __('content.print') }} {{ __('content.invoice') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $facturas->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection