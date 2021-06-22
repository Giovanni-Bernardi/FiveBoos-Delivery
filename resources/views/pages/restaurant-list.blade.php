@extends('layouts.main-layout')

@include('components.search-header')
    
@section('content')
<main>
       <!-- {{-- restaurant list --}} -->
       <div class="list-container">

                <div id="app-categories" class="list-jumbotron">
                    {{-- <h2>Scegli una categoria: </h2> --}}
                    <ul>
                        <li class="food-type"> 
                            {{-- v-on:click="addClass" :class="selected" --}}
                            <label for="type-pizza">
                                <input type="checkbox" name="type-pizza" class="type-check" id="type-pizza">
                                <img src="{{asset('/storage/assets/pizza.png')}}" alt="pizza">
                            </label>
                        </li>
                        <li class="food-type">
                            <label for="type-sushi">
                                <input type="checkbox" name="type-sushi" class="type-check">
                                <img src="{{asset('/storage/assets/sushi.png')}}" alt="">
                            </label>
                        </li>
                        <li class="food-type">
                            <label for="type-spaghetti">
                                <input type="checkbox" name="type-japanese" class="type-check">
                                <img src="{{asset('/storage/assets/japanese.png')}}" alt="">
                            </label>
                        </li>
                        <li class="food-type">
                            <label for="type-desserts">
                                <input type="checkbox" name="type-desserts" class="type-check">
                                <img src="{{asset('/storage/assets/desserts.png')}}" alt="">
                            </label>
                        </li>
                        <li class="food-type">
                            <label for="type-meat">
                                <input type="checkbox" name="type-meat" class="type-check">
                                <img src="{{asset('/storage/assets/meat.png')}}" alt="">
                            </label>
                        </li>
                        <li class="food-type">
                            <label for="type-american">
                                <input type="checkbox" name="type-american" class="type-check">
                                <img src="{{asset('/storage/assets/american.png')}}" alt="">
                            </label>
                        </li>
                        <li class="food-type">
                            <label for="type-snack">
                                <input type="checkbox" name="type-snack" class="type-check">
                                <img src="{{asset('/storage/assets/snack.png')}}" alt="">
                            </label>
                        </li>
                        <li class="food-type">
                            <label for="type-mexican">
                                <input type="checkbox" name="type-mexican" class="type-check">
                                <img src="{{asset('/storage/assets/mexican.png')}}" alt="">
                            </label>
                        </li>
                        <li class="food-type">
                            <label for="type-cake">
                                <input type="checkbox" name="type-cake" class="type-check">
                                <img src="{{asset('/storage/assets/cake.png')}}" alt="">
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="titles-restaurant-list">
                <h2 id="title">FIVEBOO'S</h2>
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
       </div>
</main>
    
@endsection