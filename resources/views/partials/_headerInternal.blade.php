<header>
    <div class="cabeceraInterna">
        <div class="logo">
            <img src="{{ asset('img/logos/ecolac4.png') }}" alt="">
        </div>
        <div class="cinta">
            <div class="opcion">
                <a href="{{ route('provincias.index') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/provincias.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.provinces') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('ciudades.index') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/ciudades.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.cities') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('sucursales.index') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/sucursales.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.offices') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('categorias.index') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/categorias.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.categories') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('tipos.index') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/tipos.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.types') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a href="{{ route('presentaciones.index') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/presentaciones.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.presentations') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="{{ route('productos.index') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/productos.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.products') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="{{ route('roles.index') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/roles.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.roles') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="#">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/menus.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.menus') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="{{ route('usuarios.index') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/usuarios.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.users') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="{{ route('pedidos.index','Pedidos') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/pedidos.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.orders') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="#">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/ventas.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.sales') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="{{ route('pedidos.index','Despachos') }}">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/despachos.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.deliveries') }}
                    </div>
                </a>
            </div>
            <div class="opcion">
                <a class="" href="#">
                    <div class="icono" style="background-image: url({{ asset('img/iconos/reportes.png') }})"></div>
                    <div class="titulo">
                        {{ __('content.reports') }}
                    </div>
                </a>
            </div>
         
        </div>
    </div>

</header>


