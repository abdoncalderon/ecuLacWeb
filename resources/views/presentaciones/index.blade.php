@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.presentations') }}</li>
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
        <div class="titulo">{{ __('content.presentations') }}</div>
        <div class="contenido">
            <div class="index">

                {{-- AGREGAR PRESENTACION --}}
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('presentaciones.create')}}">{{ __('content.add') }}  {{ __('content.presentation') }}</a>
                    </span>
                </div>

                {{-- LISTA DE PRESENTACIONES --}}
                <div class="table-responsive">
                    <table class="tabla">

                        {{-- CABECERA --}}
                        <thead>
                            <tr>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.category') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>

                        {{-- PRESENTACIONES --}}
                        <tbody>
                            @foreach ($presentaciones as $presentacion)
                                <tr>
                                    <td>{{ $presentacion->envase.' '.$presentacion->contenido.' '.$presentacion->medida }}</td>
                                    <td>{{ $presentacion->categoria->nombre }}</td>
                                    <td>
                                        <a class="accion" href="{{route('presentaciones.edit',$presentacion)}}">{{ __('content.edit') }}</a>
                                        <a class="accion" href="{{route('presentaciones.destroy',$presentacion->id)}}">{{ __('content.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $presentaciones->links() }}
            </div>
        </div>
    </div>

@endsection