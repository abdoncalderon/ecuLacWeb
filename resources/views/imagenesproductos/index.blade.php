@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('productos.index')}}">{{ __('content.products') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.images') }}</li>
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

        <div class="titulo">{{ __('content.images') }}  {{ $producto->nombre }}</div>

            <div class="contenido">

                <div class="galeria">

                    <form method="POST" action="{{ route('imagenesproductos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="formulario">
                            <label class="etiqueta" for="imagen">{{ __('content.search')}}</label>
                            <input class="archivo" type="text" disabled id="nombreArchivo">
                            <input type="text" hidden id="producto_id" name="producto_id" value="{{ $producto->id}}">
                            <input class="dialogo" type="file" onchange="document.getElementById('nombreArchivo').value=this.value" class="abrirAarchivo" id="imagen" name="imagen" accept="image/x-png,image/gif,image/jpeg"/>
                            <button class="btn btn-success" type="submit">{{ __('content.save')}} {{ __('content.image')}}</button>
                        </div>
                    </form>
                    
                    <div class="imagenes">
                        @foreach($imagenes as $imagen)
                            <div class="imagen">
                                <div class="foto" style="background-image: url('{{ asset('img/productos/'.$imagen->imagen)}}')"></div>
                                <a class="{{  $imagen->predeterminada==1 ? 'predeterminada' : 'noPredeterminada' }}" href="{{ route('imagenesproductos.default',$imagen) }}">{{  $imagen->predeterminada==1 ? __('content.default') : __('content.noDefault') }}</a>
                                <a class="eliminar" href="{{ route('imagenesproductos.destroy',$imagen) }}">{{ __('content.delete') }}</a>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
