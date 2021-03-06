@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.categories') }}</li>
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
        <div class="titulo">{{ __('content.categories') }}</div>
        <div class="contenido">
            <div class="index">

                {{-- AGREGAR CATEGORIA --}}
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('categorias.create')}}">{{ __('content.add') }}  {{ __('content.category') }}</a>
                    </span>
                </div>

                {{-- LISTAR CATEGORIAS --}}
                <div class="table-responsive">
                    <table class="tabla">

                        {{-- CABECERA --}}
                        <thead>
                            <tr>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>

                        {{-- CATEGORIAS --}}
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>{{ $categoria->estado() }}</td>
                                    <td>
                                        <a class="accion" href="{{route('categorias.edit',$categoria)}}">{{ __('content.edit') }}</a>
                                        <a class="accion" href="{{route('categorias.destroy',$categoria->id)}}">{{ __('content.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categorias->links() }}
            </div>
        </div>
    </div>

@endsection
