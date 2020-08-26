 <nav>
    <div class="menuPrincipal">
        <p class="bienvenida">{{ __('content.welcome') }} {{ auth()->user()->nombreCompleto ?? ''}}</p>
        @guest
            <a class="logout" href="{{ route('login') }}">{{ __('content.login') }}</a>
        @else
            <a class="logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('messages.closeSession')}}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        @endguest
    </div>
</nav>