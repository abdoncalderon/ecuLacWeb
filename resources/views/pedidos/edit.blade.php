@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pedidos.index')}}">{{ __('content.order') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.open') }}</li>
            </ol>
        </nav>
    </div>
@endsection