
 <nav>
    <div class="menuPrincipal">
        <p class="bienvenida">{{ __('content.welcome') }} {{ auth()->user()->nombreCompleto ?? ''}}</p>
        @auth
            <a class="logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('messages.closeSession')}}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </div>
</nav>