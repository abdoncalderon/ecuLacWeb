@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('productos.index')}}">{{ __('content.products') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.move').' '.__('content.stock') }}</li>
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
        <div class="titulo">{{ __('content.move').' '.__('content.stock') }} {{ $producto->nombre }}</div>
        <div class="contenido">
            <div class="index">
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('movimientosexistencias.create',$producto) }}">{{ __('content.add') }}  {{ __('content.stock') }}</a>
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>{{ __('content.date') }}</th>
                                <th>{{ __('content.office') }}</th>
                                <th>{{ __('content.user') }}</th>
                                <th>{{ __('content.move') }}</th>
                                <th>{{ __('content.quantity') }}</th>
                                <th>{{ __('content.balance') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientosExistencias as $movimientoExistencia)
                                <tr>
                                    <td>{{ $movimientoExistencia->fecha }}</td>
                                    <td>{{ $movimientoExistencia->sucursal($movimientoExistencia->sucursal_id) }}</td>
                                    <td>{{ $movimientoExistencia->usuario($movimientoExistencia->usuario_id) }}</td>
                                    <td>{{ $movimientoExistencia->tipoMovimiento }}</td>
                                    <td>{{ $movimientoExistencia->cantidad }}</td>
                                    <td>{{ $movimientoExistencia->saldo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $movimientosExistencias->links() }}
            </div>
        </div>
    </div>

@endsection