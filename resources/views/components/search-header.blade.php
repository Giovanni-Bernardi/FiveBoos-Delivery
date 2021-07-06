<header id="scrolledHeader" class="orange">
    <nav>
        {{-- Sezione sx: hamburger + logo --}}
        <div class="sx-section">
            <!-- Icona hamburger -->
            <div class="ham-container" id="ham">
                <div class="hamburger">
                </div>
            </div>
    
            <ul class='menulist'>
                @auth
                    <li><a href='{{ route('restaurantProfileViewLink')}}'>Il mio profilo</a></li>
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
                @endauth

                @guest
                    <li><a href='{{ route('login') }}'>Accedi</a></li>
                    <li><a href='{{ route('register') }}'>Registrati</a></li>
                @endguest
            </ul>

            <a href="{{route('indexViewLink')}}">
                <img src="{{asset('/storage/assets/site-logo/logoV4.png')}}" alt="site-logo">
                {{-- FIVEBOO'S --}}
             </a>
        </div>

        {{-- NON TOCCARE (search bar) --}}
        {{-- <div class="center-section"> --}}
            {{-- searchbar --}}
            {{-- <input type="text" class="search-bar" id="merda" placeholder="Cerca">
            <i class="fas fa-search"></i>
        </div> --}}

        <div class="rx-section">
            <i class="fas fa-user" id="user-icon"></i>
            <ul class="user-popup">
                @guest
                    <li><a href='{{ route('login') }}'>Accedi</a></li>
                    <li><a href='{{ route('register') }}'>Registrati</a></li>
                @endguest
                @auth
                    <li><a href='{{ route('restaurantProfileViewLink')}}'>Profilo</a></li>
                    {{-- <li><a href='#'>Aggiungi ristorante</a></li> --}}
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
                @endauth
            </ul>
        </div>
    </nav>
</header>
