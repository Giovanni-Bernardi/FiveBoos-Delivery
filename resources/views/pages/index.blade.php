@extends('layouts.main-layout')

@section('content')
    <main>
        {{-- landing page --}}
                <section id="landing-jumbo">
                    <div id="background-jumbo">
                        <h1 id="landing-title">
                            Hai fame? Sei nel posto giusto
                        </h1>
                        <div id="cover">
                            <form method="get" action="">
                                <div class="tb">
                                    <div class="td"><input type="text" placeholder="Indirizzo di consegna" required></div>
                                    <div class="td" id="s-cover">
                                        <button type="submit">
                                            <div id="s-circle"></div>
                                            <span></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                
        {{-- restaurant list --}}
        <ul>
            <li>
                <h4>
                    Restaurants List:
                </h4>
            </li>
        <div class="jumbo-list">
            <div class="placeholder-categories">
                <h2>qui andranno le categories per la ricerca dinamica</h2>
                {{-- slider carousel 1--}}
            </div>

            <div class="carousel-2">
                <ul>
                    <li class="food-type">
                        <label for="type-pizza"><img src="{{asset('/storage/assets/pizza.png')}}" alt=""></label>
                        <input type="checkbox" name="type-pizza" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-sushi"><img src="{{asset('/storage/assets/sushi.png')}}" alt=""></label>
                        <input type="checkbox" name="type-sushi" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-spaghetti"><img src="{{asset('/storage/assets/spaghetti.png')}}" alt=""></label>
                        <input type="checkbox" name="type-spaghetti" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-noodles"><img src="{{asset('/storage/assets/noodles.png')}}" alt=""></label>
                        <input type="checkbox" name="type-noodles" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-meat"><img src="{{asset('/storage/assets/meat.png')}}" alt=""></label>
                        <input type="checkbox" name="type-meat" class="type-check">
                    </li>
                </ul>
            </div>
        </div>
        <h2 id="title">Delivery</h2>
        <h4>
            Scegli il ristorante: 
        </h4>
        <div class="restaurants-box">
            @foreach ($restaurants as $restaurant)
                <div class="restaurant-card">
                    <div class="top-info">
                        <a href="{{route('restaurantDetailsViewLink', $restaurant -> id)}}"> {{$restaurant -> business_name}} </a>
                        <div class="categories-card">
                            {{-- categories placeholder --}}
                            <div class="cell type-pizza">
                                <a href="#"> Pizza </a>
                            </div> 
                            <div class="cell type-panini">
                                <a href="#"> Panini </a>
                            </div> 
                        </div>
                    </div>
                    <div class="bottom-info">
                        <div class="stats">
                            <i class="fas fa-thumbs-up"></i>
                            <span>--</span>
                        </div>
                        <div class="address-icon">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="address-show">
                                {{$restaurant -> address}}
                            </div>
                        </div>
                        <a href="{{route('restaurantDetailsViewLink', $restaurant -> id)}}"><i class="fas fa-utensils"></i>Mostra dettagli</a>
                    </div>
                </div>
            @endforeach
            
        </div>
    </main>
    
@endsection