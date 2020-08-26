@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.deliveries') }}</li>
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
        <div class="titulo">{{ __('content.deliveries') }} {{ __('content.clients') }}</div>
        <div class="encabezado">
            <div class="acciones">
                <span class="boton">
                    <a class="btn btn-success " href="{{ route('pedidos.create')}}">{{ __('content.create') }}  {{ __('content.order') }}</a>
                </span>
            </div>
            <form method="GET" action="{{ route('pedidos.repartidor') }}">
                <div class="filtros">
                    <span class="boton">
                        <button class="btn btn-secondary" type="submit">{{ __('content.search') }} </button>
                    </span>
                    <div class="etiqueta">{{ __('content.status') }}</div>
                    <select class="select" name="fecha" id="fecha">
                        <option value="1">{{ __('content.confirmed') }}</option>
                        <option value="2">{{ __('content.dispatched') }}</option>
                        <option value="3">{{ __('content.delivered') }}</option>
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
                
                <div class="table-responsive">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>{{ __('content.client') }}</th>
                                <th>{{ __('content.created') }}</th>
                                <th>{{ __('content.confirmed') }}</th>
                                <th>{{ __('content.dispatched') }}</th>
                                <th>{{ __('content.delivered') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->cliente($pedido->cliente_id) }}</td>
                                    <td>{{ $pedido->fechaCreacion }}</td>
                                    <td>{{ $pedido->fechaConfirmacion }}</td>
                                    <td>{{ $pedido->fechaDespacho }}</td>
                                    <td>{{ $pedido->fechaEntrega }}</td>
                                    <td>{{ $pedido->estado }}</td>
                                    <td>
                                        @if($pedido->estado!='ENTREGADO')
                                            <a class="accion" href="{{ route('pedidos.update',$pedido) }}">{{ __('content.update') }}</a>
                                        @else
                                            <a class="accion" href="{{ route('pedidos.showDelivery',$pedido) }}">{{ __('content.show') }}</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $pedidos->withQueryString()->links() }}
            </div>
        </div>
    </div>

@endsection