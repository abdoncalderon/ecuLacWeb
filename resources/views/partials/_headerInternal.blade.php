<header>
    <div class="cabeceraInterna">
        
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logos/ecolac4.png') }}" alt="">
            </a>
        </div>

        <label id="menu" for="check"><i class="fas fa-bars"></i> {{ __('content.menu') }}</label>
        <input type="checkbox" hidden id="check">
        <div class="cinta">
            @foreach (auth()->user()->rol->menus() as $menurol)
                <div class="opcion">
                    <a href="{{ route($menurol->menu->ruta) }}">
                        <div class="icono" style="background-image: url({{ asset('img/iconos/'.$menurol->menu->icono) }})"></div>
                        <div class="titulo">
                            {{ __($menurol->menu->multilenguaje) }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
    </div>
</header>


