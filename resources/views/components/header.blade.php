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
                <img src="{{asset('/storage/assets/five-bool.svg')}}" alt="site-logo">
                {{-- FIVEBOO'S --}}
             </a>
        </div>
    </nav>
</header>
