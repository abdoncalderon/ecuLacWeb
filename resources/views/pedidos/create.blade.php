@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pedidos.index')}}">{{ __('content.orders') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.create') }}</li>
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
        <div class="titulo">{{ __('content.create') }}  {{ __('content.order') }}</div>
            <div class="contenido">
                <div class="formulario">
                    <form method="POST" action="{{ route('pedidos.store') }}">
                        @csrf

                        <input id="fechaCreacion" name="fechaCreacion" hidden type="text" value="{{ Carbon\Carbon::now()->toDateTimeString() }}">

                        <div class="form-group row">
                            <label for="cliente_id" class="col-md-4 col-form-label text-md-right">{{ __('content.order') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="cliente_id"
                                    name="cliente_id" 
                                    class="form-control"
                                    required>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{$cliente->user}}">{{$cliente->nombreCompleto}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">{{ __('content.create') }}</button>
                                <a class="btn btn-secondary " href="{{ route('pedidos.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
