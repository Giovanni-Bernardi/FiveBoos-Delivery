@extends('layouts.main-layout')

@include('components.search-header')
    
@section('content')
       <!-- {{-- restaurant list --}} -->
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
                    <label for="type-spaghetti"><img src="{{asset('/storage/assets/japanese.png')}}" alt=""></label>
                    <input type="checkbox" name="type-japanese" class="type-check">
                </li>
                <li class="food-type">
                    <label for="type-desserts"><img src="{{asset('/storage/assets/desserts.png')}}" alt=""></label>
                    <input type="checkbox" name="type-desserts" class="type-check">
                </li>
                <li class="food-type">
                    <label for="type-meat"><img src="{{asset('/storage/assets/meat.png')}}" alt=""></label>
                    <input type="checkbox" name="type-meat" class="type-check">
                </li>
                <li class="food-type">
                    <label for="type-american"><img src="{{asset('/storage/assets/american.png')}}" alt=""></label>
                    <input type="checkbox" name="type-american" class="type-check">
                </li>
                <li class="food-type">
                    <label for="type-snack"><img src="{{asset('/storage/assets/snack.png')}}" alt=""></label>
                    <input type="checkbox" name="type-snack" class="type-check">
                </li>
                <li class="food-type">
                    <label for="type-mexican"><img src="{{asset('/storage/assets/mexican.png')}}" alt=""></label>
                    <input type="checkbox" name="type-mexican" class="type-check">
                </li>
                <li class="food-type">
                    <label for="type-cake"><img src="{{asset('/storage/assets/cake.png')}}" alt=""></label>
                    <input type="checkbox" name="type-cake" class="type-check">
                </li>
            </ul>
        </div>
    </div>
    <div class="titles-restaurant-list">
        <h2 id="title">Delivery</h2>
        <h4>
            Scegli il ristorante: 
        </h4>
    </div>
    <div class="restaurants-box">
    
        @foreach ($restaurants->take(12) as $restaurant)
            <div class="restaurant-card">
                <div class="top-info">
                    <div class="background-image"></div>
                    <a href="{{route('restaurantDetailsViewLink', $restaurant -> id)}}"> {{$restaurant -> business_name}} </a>
                    <div class="categories-card">
                        {{-- categories placeholder --}}
                        <div class="cell type-generic">
                            <a href="#"> Pizza </a>
                        </div> 
                        <div class="cell type-generic">
                            <a href="#"> Panini </a>
                        </div> 
                    </div>
                </div>
                <div class="bottom-info">
                    {{-- <div class="stats">
                        <i class="fas fa-thumbs-up"></i>
                        <span>--</span>
                    </div> --}}
                    <div class="address-icon">
                        <a href="{{route('restaurantDetailsViewLink', $restaurant -> id)}}"><i class="fas fa-map-marker-alt"></i></a>
                        {{-- <div class="address-show">
                            {{$restaurant -> address}}
                        </div> --}}
                    </div>
                    
                    {{-- <a href="{{route('restaurantDetailsViewLink', $restaurant -> id)}}"><i class="fas fa-utensils"></i></a> --}}
                    <div class="delivery">
                        <img src="{{asset('/storage/assets/scooter.png')}}" alt="icona consegna">
                        <div class="delivery-checkout active">
                            &euro; 1,00
                        </div> 
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
    
</main>
    
@endsection