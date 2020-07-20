@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.roles') }}</li>
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
        <div class="titulo">{{ __('content.roles') }}</div>
        <div class="contenido">
            <div class="index">
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('roles.create')}}">{{ __('content.add') }}  {{ __('content.role') }}</a>
                    </span>
                </div>
                @error('eliminar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="table-responsive">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td>{{ $rol->nombre }}</td>
                                    <td>
                                        <a class="accion" id="editar" name="editar" href="{{ route('roles.edit',$rol) }}">{{ __('content.edit') }}</a>
                                        <a class="accion" id="eliminar" name="eliminar" href="{{ route('roles.destroy',$rol->id) }}">{{ __('content.delete') }}</a>
                                        <a class="accion" id="agregar" name="agregar" href="{{ route('menusroles.add',$rol) }}">{{ __('content.menus') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $roles->links() }}
        </div>
    </div>
@endsection
