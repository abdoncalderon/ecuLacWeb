<header>
    <div class="cabeceraInterna">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logos/ecolac4.png') }}" alt="">
            </a>
            
        </div>
        <label id="menu" for="check"><i class="fas fa-bars"></i> {{ __('content.menu') }}</label>
        <input type="checkbox" hidden id="check">
        <nav class="cinta">
            @foreach (App\MenuRol::menusrol(auth()->user()->rol_id) as $menurol)
                <div class="opcion">
                    <a href="{{ route($menurol->menu($menurol->menu_id)->ruta) }}">
                        <div class="icono" style="background-image: url({{ asset('img/iconos/'.$menurol->menu($menurol->menu_id)->icono) }})"></div>
                        <div class="titulo">
                            {{ __($menurol->menu($menurol->menu_id)->multilenguaje) }}
                        </div>
                    </a>
                </div>
            @endforeach
        </nav>
    </div>
</header>


