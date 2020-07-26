@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.products') }}</li>
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
        <div class="titulo">{{ __('content.products') }}</div>
        <div class="encabezado">
           
            <div class="acciones">
                <span class="boton">
                    <a class="btn btn-success" href="{{ route('productos.create')}}">{{ __('content.add') }}  {{ __('content.product') }}</a>
                </span>
            </div>
            <form method="GET" action="{{ route('productos.index') }}">
                <div class="filtros">
                    <span class="boton">
                        <button class="btn btn-secondary" type="submit">{{ __('content.search') }}  {{ __('content.product') }}</button>
                    </span>
                    <div class="etiqueta">{{ __('content.name') }}</div>
                    <input type="text" class="text" id="nombre" name="nombre">
                    <div class="etiqueta">{{ __('content.category') }}</div>
                    <select class="select"  name="categoria" id="categoria">
                        <option value="">{{ __('content.all') }}</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    <div class="etiqueta">{{ __('content.status') }}</div>
                    <select class="select" name="estado" id="estado">
                        <option value="">{{ __('content.all') }}</option>
                        <option value="{{ __('content.available') }}">{{ __('content.available') }}</option>
                        <option value="{{ __('content.soldout') }}">{{ __('content.soldout') }}</option>
                        <option value="{{ __('content.discontinued') }}">{{ __('content.discontinued') }}</option>
                    </select>
                    
                </div>
            </form>
        </div>
        <div class="contenido">
            <div class="index">
                
                <div class="table-responsive">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>{{ __('content.image') }} {{ __('content.default') }} </th>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.category') }}/{{ __('content.type') }}/{{ __('content.presentation') }}</th>
                                <th>{{ __('content.price') }}</th>
                                <th>{{ __('content.discount') }} %</th>
                                <th>{{ __('content.tax') }} %</th>
                                <th>{{ __('content.stock') }}</th>
                                <th>{{ __('content.highLights') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td><img src="{{ asset('img/productos/'.$producto->imagenPredeterminada($producto->id)) }}" alt=""></td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->categoria($producto->categoria_id) }} / {{ $producto->tipo($producto->tipo_id) }} / {{ $producto->presentacion($producto->presentacion_id) }}</td>
                                    <td>{{ $producto->precioUnitario }}</td>
                                    <td>{{ $producto->descuento }}</td>
                                    <td>{{ $producto->iva }}</td>
                                    <td>{{ $producto->existenciaActual }}</td>
                                    <td> <span class="badge badge-pill badge-info">{{ $producto->esDestacado == true ? 'Destacado' : '' }}</span> </td>
                                    <td>{{ $producto->estado }}</td>
                                    <td>
                                        <a class="accion" href="{{route('productos.edit',$producto)}}">{{ __('content.edit') }}</a>
                                        <a class="accion" href="{{route('imagenesproductos.index',$producto)}}">{{ __('content.images') }}</a>
                                        <a class="accion" href="{{route('movimientosexistencias.index',$producto)}}">{{ __('content.stock') }}</a>
                                        <a class="accion" href="{{route('productos.destroy',$producto->id)}}">{{ __('content.delete') }}</a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $productos->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

