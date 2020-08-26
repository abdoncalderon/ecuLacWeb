@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('reportes.index')}}">{{ __('content.reports') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.inventory') }}</li>
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
        
        <div class="titulo">{{ __('content.inventory')}}</div>
        <div class="encabezado">
            <div class="resumen">
                <div class="cantidad">{{ __('content.quantity') }}: <br> {{ $cantidadProductos }} {{ __('content.unities') }}</div>
                <div class="total"> Total: <br> {{ __('content.currency') }} {{ number_format($totalProductos,2) }}</div>
            </div>

            <form method="GET" action="{{ route('reportes.inventario') }}">
                <div class="filtros">
                    <span class="boton">
                        <input id="buscar" name="buscar" class="btn btn-secondary" type="submit" value="{{ __('content.search') }}">
                        <input id="imprimir" name="imprimir" class="btn btn-secondary" type="submit" value="{{ __('content.print') }}">
                    </span>
                    <div class="etiqueta">{{ __('content.category') }}</div>
                    <select class="select"  name="categoria" id="categoria">
                        <option value="">{{ __('content.all') }}</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
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
                                <th>{{ __('content.code') }}</th>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.price') }}</th>
                                <th>{{ __('content.stock') }}</th>
                                <th>{{ __('content.value') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ sprintf('%08d',$producto->id) }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->precioUnitario }}</td>
                                    <td>{{ $producto->existenciaActual }}</td>
                                    <td>{{ number_format($producto->existenciaActual * $producto->precioUnitario,2) }}</td>

                                    <td>
                                        <a class="accion" href="#">{{ __('content.print') }} {{ __('content.move') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $productos->links() }}
            </div>
        </div>
    </div>
@endsection