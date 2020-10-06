@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.offices') }}</li>
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
        <div class="titulo">{{ __('content.offices') }}</div>
        <div class="contenido">
            <div class="index">

                {{-- AGREGAR SUCURSAL --}}
                <div>
                    <span>
                    <a class="btn btn-success " href="{{ route('sucursales.create')}}">{{ __('content.add') }}  {{ __('content.office') }}</a>
                    </span>
                </div>

                {{-- LISTA DE SUCURSALES--}}
                <div class="table-responsive">
                    <table class="tabla">

                        {{-- CABECERA --}}
                        <thead>
                            <tr>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.city') }}</th>
                                <th>{{ __('content.address') }}</th>
                                <th>{{ __('content.phone') }}</th>
                                <th>{{ __('content.actions') }}</th>
                            </tr>
                        </thead>

                        {{-- SUCURSALES --}}
                        <tbody>
                            @foreach ($sucursales as $sucursal)
                                <tr>
                                    <td>{{ $sucursal->nombre }}</td>
                                    <td>{{ $sucursal->ciudad->nombre }}</td>
                                    <td>{{ $sucursal->direccion }}</td>
                                    <td>{{ $sucursal->telefono }}</td>
                                    <td>
                                        <a class="accion" href="{{route('sucursales.edit',$sucursal)}}">{{ __('content.edit') }}</a>
                                        <a class="accion" href="{{route('sucursales.destroy',$sucursal->id)}}">{{ __('content.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $sucursales->links() }}
            </div>
        </div>
    </div>

@endsection
