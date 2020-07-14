<header>
    <div class="cabeceraExterna">
        <div class="logo">
            <a href="{{ route('home')}}">
                <img src="{{ asset('img/logos/ecolac4.png') }}">
            </a>
        </div>
        <div class="busqueda">
            <form method="POST" action="{{ route('tienda.catalogo') }}">
                @csrf
                <input 
                    id="busqueda"
                    name="busqueda"
                    class="textbox" 
                    type="text"
                    placeholder="Busque su producto" 
                >
                <i class="fas fa-search"></i>
            </form>
        </div>
        <div class="favoritos">
            <a href="#"><i class="far fa-heart"></i></a>
        </div>
        <div class="carrito">
            <a href="{{ route('clientes.pedido') }}"><i class="fas fa-shopping-cart"></i></a>
            @auth
                <p>{{ count( App\Pedido::items(App\Pedido::abierto(auth()->id()))) ?? '0' }}</p>
            @endauth
        </div>
        @guest
            <div class="login">
                <a href="{{ route('login') }}">{{ __('content.login') }}</a>
            </div>
            <div class="registro">
                <a href="{{ route('register') }}">{{ __('content.register') }}</a>
            </div>
        @else
            <div class="cuenta">
                <a href="{{ route('clientes.cuenta') }}">{{ __('content.account') }}</a>
            </div>
            <div class="logout">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('content.logout')}}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </div>
        @endguest
    </div>
</header>