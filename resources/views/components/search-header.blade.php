<header id="scrolledHeader">
    <nav>
        {{-- Sezione sx: hamburger + logo --}}
        <div class="sx-section">
            <!-- Icona hamburger -->
            <div class="ham-container" id="ham">
                <div class="hamburger">
                </div>
            </div>
    
            <ul class='menulist'>
                <li><a href='#'>Registrati</a></li>
                <li><a href='#'>Il mio profilo</a></li>
                <li><a href='#'>Aggiungi ristorante</a></li>
                <li><a href='#'>Logout</a></li>
            </ul>
            <a href="{{route('indexViewLink')}}">
                <img src="{{asset('/storage/assets/site-logo/site-logo.svg')}}" alt="site-logo">
                {{-- FIVEBOO'S --}}
             </a>
        </div>

        <div class="center-section">
            {{-- searchbar --}}
            <input type="text" class="search-bar" id="merda" placeholder="Cerca">
            {{-- <i class="fas fa-pizza-slice"></i> --}}
            <i class="fas fa-search"></i>
        </div>

        <div class="rx-section">
            <i class="fas fa-user" id="user-icon"></i>
            <ul class="user-popup">
                @guest
                    <li>
                        <a href="">
                            Accedi
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Registrati
                        </a>
                    </li>
                @endguest
                @auth
                    <li>
                        <a href="">
                            Profilo
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Esci
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
