<header>
    <div class="cabeceraInterna">
        <div class="logo">
            <img src="{{ asset('img/ecolac4.png') }}" alt="">
        </div>
        <div class="cinta">
            <div class="opcion">
                <a href="{{ route('provincias.index') }}">
                    <img class="icono" src="{{ asset('img/provincias.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.provinces') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('ciudades.index') }}">
                    <img class="icono" src="{{ asset('img/ciudades.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.cities') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('sucursales.index') }}">
                    <img class="icono" src="{{ asset('img/sucursales.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.offices') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('categorias.index') }}">
                    <img class="icono" src="{{ asset('img/categorias.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.categories') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('tipos.index') }}">
                    <img class="icono" src="{{ asset('img/tipos.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.types') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('presentaciones.index') }}">
                    <img class="icono" src="{{ asset('img/presentaciones.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.presentations') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="{{ route('productos.index') }}">
                    <img class="icono" src="{{ asset('img/productos.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.products') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="{{ route('roles.index') }}">
                    <img class="icono" src="{{ asset('img/roles.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.roles') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="#">
                    <img class="icono" src="{{ asset('img/menus.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.menus') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="{{ route('usuarios.index') }}">
                    <img class="icono" src="{{ asset('img/usuarios.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.users') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="{{ route('pedidos.index') }}">
                    <img class="icono" src="{{ asset('img/pedidos.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.orders') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="#">
                    <img class="icono" src="{{ asset('img/ventas.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.sales') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="#">
                    <img class="icono" src="{{ asset('img/despachos.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.deliveries') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="#">
                    <img class="icono" src="{{ asset('img/reportes.png') }}" alt="">
                    <div class="titulo">
                        {{ __('content.reports') }}
                    </div>
                </a>
            </div>
         
        </div>
    </div>

</header>


