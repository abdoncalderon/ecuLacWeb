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
                {{ $pedidos->links() }}
            </div>
        </div>
    </div>

@endsection