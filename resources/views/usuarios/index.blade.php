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
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('usuarios.create')}}">{{ __('content.add') }}  {{ __('content.user') }}</a>
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>{{ __('content.fullname') }}</th>
                                <th>{{ __('content.role') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->nombreCompleto }}</td>
                                    <td>{{ $usuario->rol($usuario->rol_id) }}</td>
                                    <td>{{ $usuario->estaActivo==1 ? __('content.active') : __('content.inactive') }}</td>
                                    <td>
                                        <a class="accion" href="#">{{ __('content.edit') }}</a>
                                        <a class="accion" href="{{route('usuarios.activate',$usuario)}}">{{ $usuario->estaActivo==0 ? __('content.activate') : __('content.deactivate')  }}</a>
                                        <a class="accion" href="{{route('usuarios.destroy',$usuario)}}">{{ __('content.delete') }}</a>
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