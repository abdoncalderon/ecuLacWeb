@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index')}}">{{ __('content.roles') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.add') }} {{ __('content.menu') }}</li>
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
    <div class="ventana">
        <div class="titulo">{{ __('content.add') }}  {{ __('content.menus') }} - {{ $rol->nombre }}</div>
            <div class="contenido">
                <div class="formulario">
                    <form method="POST" action="{{ route('menusroles.store',$rol) }}">
                        @csrf

                        <input 
                            id="rol_id"
                            name="rol_id"
                            hidden
                            required
                            value="{{ $rol->id}}"
                        >

                        <div class="form-group row">
                            <label for="menu_id" class="col-md-4 col-form-label text-md-right">{{ __('content.menu') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="menu_id"
                                    name="menu_id" 
                                    class="form-control"
                                    required>
                                    @foreach ($menusdisponibles as $menu)
                                        <option value="{{$menu->id}}">{{$menu->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">{{ __('content.add') }}</button>
                                <a class="btn btn-secondary " href="{{ route('roles.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>

                    </form>
                    <div class="table-responsive">
                        <table class="tabla">
                            <thead>
                                <tr>
                                    <th>{{ __('content.menu') }}</th>
                                    <th>{{ __('content.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mismenus as $mimenu)
                                    <tr>
                                        <td>{{$mimenu->menu($mimenu->menu_id)->nombre}}</td>
                                        <td>
                                            <a class="accion" href="{{ route('menusroles.destroy',['menu'=>$mimenu->menu_id,'rol'=>$rol])}}">{{ __('content.delete') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection