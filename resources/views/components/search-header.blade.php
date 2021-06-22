<header>
    <nav id="search-nav" :class="scrollPosition > 0 ? 'scroll-color' : 'transparent'">
        <div class='site-logo-2'>
            <a href="{{route('indexViewLink')}}">
                <img src="{{asset('/storage/assets/five-bool.svg')}}" alt="site-logo">
                {{-- FIVEBOO'S --}}
            </a>
        </div>
        {{-- searchbar --}}
        <div id="container-search">
            @include ('components.searchbar')
        </div>
        {{-- hamburger menù --}}
        <input class="check" type="checkbox">
        <div class="ham-menu">
            <div class="menuline"></div>
        </div>
        <ul class='menulist'>
            <li><a href='#'>Registrati</a></li>
            <li><a href='#'>Il mio profilo</a></li>
            <li><a href='#'>Aggiungi ristorante</a></li>
            <li><a href='#'>Logout</a></li>
        </ul>
        {{-- cart --}}
        <i id="cart" class="fas fa-shopping-cart"></i>
    </nav>
</header>
