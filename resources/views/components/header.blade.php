<header>
    <nav :class="scrollPosition > 0 ? 'scroll-color' : 'transparent'">
        <div class='site-logo'>
            <a href="{{route('indexViewLink')}}">
                <img src="{{asset('/storage/assets/five-bool.svg')}}" alt="site-logo">
                {{-- FIVEBOO'S --}}
            </a>
        </div>
        <input class="check" type="checkbox">
        <div class="ham-menu">
            <div class="menuline"></div>
        </div>
        <ul class='menulist'>
            <li><a href='{{ route('login') }}'>Accedi</a></li>
            <li><a href='#'>Registrati</a></li>
            <li><a href='#'>Il mio profilo</a></li>
            <li><a href='#'>Aggiungi ristorante</a></li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</header>
