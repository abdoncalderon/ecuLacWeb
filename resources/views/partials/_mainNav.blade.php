 <nav>
    <div class="menuPrincipal">
        @guest
            <a class="bienvenida" href="{{ route('register') }}">{{ __('content.register') }}</a>
            <a class="logout" href="{{ route('login') }}">{{ __('content.login') }}</a>
        @else
            <p class="bienvenida">{{ __('content.welcome') }} {{ auth()->user()->nombreCompleto ?? ''}}</p>
            <a class="logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('messages.closeSession')}}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        @endguest
    </div>
</nav>