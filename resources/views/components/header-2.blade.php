<header>
  <nav :class="scrollPosition > 0 ? 'scroll-color' : 'transparent'">
      <div class='site-logo'><a href="{{route('indexViewLink')}}">DeliveBoo</a></div>
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
      @include('components.searchbar')
  </nav>
</header>