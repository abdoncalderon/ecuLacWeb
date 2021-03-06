<header>
    <div class="cabeceraExterna">
        <div class="logo">
            <a href="{{ route('home')}}">
                <img src="{{ asset('img/logos/ecolac4.png') }}">
            </a>
        </div>
        <div class="busqueda">
            <form method="GET" action="{{ route('tienda.busqueda') }}">
                @csrf
                <input 
                    id="busqueda"
                    name="busqueda"
                    class="textbox" 
                    type="text"
                    placeholder="Busque su producto" 
                >
                <button type="submit" hidden></button>
                <i class="fas fa-search"></i>
                <input type="text" hidden id="orden" name="orden" value="1">
            </form>
        </div>
        @guest
            <div class="icono1">
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
            </div>
            <div class="icono2">
                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i></a>
            </div>
        @else
            <div class="icono1">
                <a href="{{ route('clientes.cuenta') }}"><i class="fas fa-user"></i></a>
            </div>
            <div class="icono2">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        @endguest
       
        <div class="favoritos">
            <a href="#"><i class="far fa-heart"></i></a>
        </div>
        <div class="carrito">
            <a href="{{ route('clientes.pedido') }}"><i class="fas fa-shopping-cart"></i></a>
            @auth
                @if(App\Pedido::abierto(auth()->id())!=0)
                    <p>{{ count( App\Pedido::itemsPedidoAbierto(App\Pedido::abierto(auth()->id()))) ?? '0' }}</p>
                @endif
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
                <a href="{{ route('clientes.cuenta') }}">{{ __('messages.myAccount') }}</a>
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