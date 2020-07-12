@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.cities') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')

<div class='ventana'>
    <div class="titulo">{{ __('content.cities') }}</div>
    <div class="contenido">

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ $errors->first() }}
            </div>
        @endif

        <div class="index">
            
            <div>
                <span>
                <a class="btn btn-success " href="{{ route('ciudades.create')}}">{{ __('content.add') }}  {{ __('content.city') }}</a>
                </span>
            </div>
            <div class="table-responsive">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.province') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ciudades as $ciudad)
                            <tr>
                                <td>{{ $ciudad->nombre }}</td>
                                <td>{{ $ciudad->provincia($ciudad->provincia_id) }}</td>
                                <td>
                                    <a class="accion" href="{{route('ciudades.edit',$ciudad)}}">{{ __('content.edit') }}</a>
                                    <a class="accion" href="{{route('ciudades.destroy',$ciudad->id)}}">{{ __('content.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $ciudades->links() }}
        </div>
    </div>
</div>

@endsection



   