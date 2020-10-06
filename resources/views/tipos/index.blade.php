@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.types') }}</li>
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
        <div class="titulo">{{ __('content.types') }}</div>
        <div class="contenido">
            <div class="index">
                {{-- AGREGAR TIPOS --}}
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('tipos.create')}}">{{ __('content.add') }}  {{ __('content.type') }}</a>
                    </span>
                </div>
                {{-- LISTA DE TIPOS --}}
                <div class="table-responsive">
                    <table class="tabla">
                        {{-- CABECERA --}}
                        <thead>
                            <tr>
                                <th>{{ __('content.category') }}</th>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>
                        {{-- TIPOS --}}
                        <tbody>
                            @foreach ($tipos as $tipo)
                                <tr>
                                    <td>{{ $tipo->categoria->nombre }}</td>
                                    <td>{{ $tipo->nombre }}</td>
                                    <td>
                                        <a class="accion" href="{{route('tipos.edit',$tipo)}}">{{ __('content.edit') }}</a>
                                        <a class="accion" href="{{route('tipos.destroy',$tipo->id)}}">{{ __('content.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $tipos->links() }}
            </div>
        </div>
    </div>

@endsection
