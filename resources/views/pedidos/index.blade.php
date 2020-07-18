@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $vista }}</li>
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
        <div class="titulo">{{ $vista }} {{ __('content.clients')}}</div>
        <div class="contenido">
            <div class="index">
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('pedidos.create',$vista)}}">{{ __('content.create') }}  {{ __('content.order') }}</a>
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>{{ __('content.client') }}</th>
                                <th>{{ __('content.created') }}</th>
                                <th>{{ __('content.confirmed') }}</th>
                                <th>{{ __('content.delivered') }}</th>
                                <th>{{ __('content.received') }}</th>
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
                                        @switch($vista)
                                            @case('Pedidos')
                                                @if($pedido->estado=='ABIERTO')
                                                    <a class="accion" href="{{ route('pedidos.edit',['vista'=>$vista, 'pedido'=>$pedido]) }}">{{ __('content.edit') }}</a>
                                                @else
                                                    <a class="accion" href="{{ route('pedidos.show',['vista'=>$vista, 'pedido'=>$pedido]) }}">{{ __('content.show') }}</a>
                                                @endif
                                                @break
                                            @case('Despachos')
                                                
                                                @break
                                            @default
                                                
                                        @endswitch
                                        {{-- <a class="accion" href="{{ route('pedidos.show',['vista'=>$vista, 'pedido'=>$pedido]) }}">{{ __('content.show') }}</a> --}}
                                        <a class="accion" href="{{ route('pedidos.destroy',$pedido->id) }}">{{ __('content.delete') }}</a>
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