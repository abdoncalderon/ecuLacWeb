@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.users') }}</li>
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
        <div class="titulo">{{ __('content.users') }}</div>
        <div class="contenido">
            <div class="index">

                {{-- AGREGAR USUARIO --}}
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('usuarios.create')}}">{{ __('content.add') }}  {{ __('content.user') }}</a>
                    </span>
                </div>

                {{-- LISTA DE USUARIOS --}}
                <div class="table-responsive">
                    <table class="tabla">
                        {{-- CABECERA --}}
                        <thead>
                            <tr>
                                <th>{{ __('content.fullname') }}</th>
                                <th>{{ __('content.role') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>
                        {{-- USUARIOS --}}
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->nombreCompleto }}</td>
                                    <td>{{ $usuario->rol->nombre }}</td>
                                    <td>{{ $usuario->estaActivo==0 ? __('content.active') : __('content.inactive') }}</td>
                                    <td>
                                        <a class="accion" href="{{route('usuarios.edit',$usuario->id)}}">{{ __('content.edit') }}</a>
                                        <a class="accion" href="{{route('usuarios.activate',$usuario->id)}}">{{ $usuario->estaActivo==1 ? __('content.activate') : __('content.deactivate')  }}</a>
                                        <a class="accion" href="{{route('usuarios.destroy',$usuario->id)}}">{{ __('content.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>

@endsection