@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('productos.index')}}">{{ __('content.products') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.add') }}</li>
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


    <div class="ventana">
        <div class="titulo">{{ __('content.add') }}  {{ __('content.products') }}</div>
            <div class="contenido">
                <div class="formulario">
                    <form method="POST" action="{{ route('productos.store') }}">
                        @csrf

                        {{-- NOMBRE --}}
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('content.name') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="nombre" 
                                    name="nombre" 
                                    type="text" 
                                    maxlength="100" 
                                    class="form-control @error('contenido') is-invalid @enderror" 
                                    value="{{ old('nombre') }}" 
                                    required 
                                    autocomplete="nombre" 
                                    placeholder="Nombre del Producto"
                                    autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- DESCRIPCION --}}
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('content.description') }}</label>
                            <div class="col-md-6">
                                <textarea
                                    id="descripcion" 
                                    name="descripcion" 
                                    maxlength="255" 
                                    class="form-control @error('contenido') is-invalid @enderror" 
                                    required
                                    placeholder="Descripción"
                                    autofocus></textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- CATEGORIA --}}
                        <div class="form-group row">
                            <label for="categoria_id" class="col-md-4 col-form-label text-md-right">{{ __('content.category') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="categoria_id"
                                    name="categoria_id" 
                                    class="form-control"
                                    required>
                                    <option value="">{{__('messages.select')}} {{__('content.category')}}</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- TIPO --}}
                        <div class="form-group row">
                            <label for="tipo_id" class="col-md-4 col-form-label text-md-right">{{ __('content.type') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="tipo_id"
                                    name="tipo_id" 
                                    class="form-control"
                                    required>
                                   
                                </select>
                            </div>
                        </div>


                        {{-- PRESENTACION --}}
                        <div class="form-group row">
                            <label for="presentacion_id" class="col-md-4 col-form-label text-md-right">{{ __('content.presentation') }}</label>
                            <div class="col-md-6">
                                <select 
                                    id="presentacion_id"
                                    name="presentacion_id" 
                                    class="form-control"
                                    required>
                                </select>
                            </div>
                        </div>

                        {{-- PRECIO --}}
                        <div class="form-group row">
                            <label for="precioUnitario" class="col-md-4 col-form-label text-md-right">{{ __('content.price') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="precioUnitario" 
                                    name="precioUnitario" 
                                    type="text" 
                                    maxlength="6" 
                                    class="form-control @error('precioUnitario') is-invalid @enderror" 
                                    value="{{ old('precioUnitario') }}" 
                                    required 
                                    autocomplete="precioUnitario" 
                                    placeholder="0.00"
                                    autofocus>

                                @error('contenido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- DESCUENTO --}}
                        <div class="form-group row">
                            <label for="descuento" class="col-md-4 col-form-label text-md-right">{{ __('content.discount') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="descuento" 
                                    name="descuento" 
                                    type="text" 
                                    maxlength="4" 
                                    class="form-control @error('descuento') is-invalid @enderror" 
                                    value="{{ old('descuento') }}" 
                                    required 
                                    autocomplete="descuento" 
                                    placeholder="0.00 %"
                                    autofocus>

                                @error('descuento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- IMPUESTO --}}
                        <div class="form-group row">
                            <label for="iva" class="col-md-4 col-form-label text-md-right">{{ __('content.tax') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="iva" 
                                    name="iva" 
                                    type="text" 
                                    maxlength="4" 
                                    class="form-control @error('precioUnitario') is-invalid @enderror" 
                                    value="{{ old('iva') }}" 
                                    required 
                                    autocomplete="iva" 
                                    placeholder="0.00 %"
                                    autofocus>

                                @error('iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- BOTONES --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">{{ __('content.save') }}</button>
                                <a class="btn btn-secondary " href="{{ route('productos.index') }}">{{ __('content.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () { 
            $("#categoria_id").change(
                function(event){
                    $("#tipo_id").empty();
                    $.get("/getTiposCategoria/"+event.target.value+"", 
                        function(response,state){
                            console.log(response)
                            
                            for(i=0;i<response.length;i++){
                                $("#tipo_id").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                            }
                        });
                    $("#presentacion_id").empty();
                    $.get("/getPresentacionesCategoria/"+event.target.value+"", 
                        function(response,state){
                            console.log(response)
                            
                            for(i=0;i<response.length;i++){
                                $("#presentacion_id").append("<option value='"+response[i].id+"'> "+response[i].envase+" / "+response[i].contenido+" / "+response[i].medida+"</option>");
                            }
                        
                        });
                }
            );
            
        });

    </script>
@endsection
