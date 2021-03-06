@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.provinces') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')

    {{-- MENSAJES DE ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $errors->first() }}
        </div>
    @endif

    <div class='ventana'>
        <div class="titulo">{{ __('content.provinces') }}</div>
        <div class="contenido">
            <div class="index">

                {{-- AGREGAR PROVINCIA --}}
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('provincias.create')}}">{{ __('content.add') }}  {{ __('content.province') }}</a>
                    </span>
                </div>

                {{-- LISTA DE PROVINCIAS --}}
                <div class="table-responsive">
                    <table class="tabla">
               
                        {{-- CABECERA --}}
                        <thead>
                            <tr>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>

                        {{-- PROVINCIAS --}}
                        <tbody>
                            @foreach ($provincias as $provincia)
                                <tr>
                                    <td>{{ $provincia->nombre }}</td>
                                    <td>
                                        <a  class="accion" id="eliminar" name="eliminar" href="{{route('provincias.destroy',$provincia->id)}}">{{ __('content.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $provincias->links() }}
        </div>
    </div>
@endsection




