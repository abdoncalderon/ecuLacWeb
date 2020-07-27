@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.menus') }}</li>
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
        <div class="titulo">{{ __('content.menus') }}</div>
        <div class="encabezado">
            <div class="acciones">
                <span class="boton">
                    <a class="btn btn-success " href="{{ route('menus.create')}}">{{ __('content.add') }}  {{ __('content.menus') }}</a>
                </span>
            </div>
            <form method="GET" action="{{ route('menus.index') }}">
                <div class="filtros">
                    <span class="boton">
                        <button class="btn btn-secondary" type="submit">{{ __('content.search') }}  {{ __('content.menu') }}</button>
                    </span>
                    <div class="etiqueta">{{ __('content.name') }}</div>
                    <input type="text" class="text" id="nombre" name="nombre">
                </div>
            </form>
        </div>
        <div class="contenido">
            <div class="index">
               {{--  <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('menus.create')}}">{{ __('content.add') }}  {{ __('content.menus') }}</a>
                    </span>
                </div>
                @error('eliminar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
                <div class="table-responsive">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.code') }} {{ __('content.multilanguage') }}</th>
                                <th>{{ __('content.route') }} Laravel</th>
                                <th>{{ __('content.image') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $menu->nombre }}</td>
                                    <td>{{ $menu->multilenguaje }}</td>
                                    <td>{{ $menu->ruta }}</td>
                                    <td>{{ $menu->icono }}</td>
                                    <td>
                                        <a class="accion" href="{{route('menus.edit',$menu)}}">{{ __('content.edit') }}</a>
                                        <a  class="accion" id="eliminar" name="eliminar" href="{{route('menus.destroy',$menu)}}">{{ __('content.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $menus->links() }}
        </div>
    </div>
@endsection