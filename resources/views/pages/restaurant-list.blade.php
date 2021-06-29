@extends('layouts.search-layout')

@include('components.search-header')
@include('components.preloader')
    
@section('content')
<main>
    {{-- VUE Riecerca dinamica --}}
    <div id="appSearch"> 
        <!-- {{-- restaurant list --}} -->
        <div class="list-container">
            <div id="app-categories" class="list-jumbotron">
                <ul>
                    <li v-for="category in categories" class="food-type" :class="filter.includes(category.id) ? 'active' : ''"> 
                        <div class="img-container">
                            <input type="checkbox" name="" class="" :value="category.id" v-model="filter" v-on:change="filter != false ? getFilteredRestaurant() : ''">
                            <img :src="'/storage/assets/' + category.img" alt="pizza" :id="category.name">
                            <p class="cat-name">@{{category.name}}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        {{-- <div class="titles-restaurant-list">
            
        </div> --}}

        <ul class="restaurants-box" v-if="filter == false">
            <li class="titles-restaurant-list">
                <h2>Ristoranti in zona</h2>
            </li>
            {{-- <ul v-if="filter == false">
                <li v-for="restaurant in restaurantsList">
                    Name: @{{restaurant.business_name}}
                    <strong v-for="genre in restaurant.categories">
                        - @{{genre.name}}
                    </strong>
                </li>
            </ul>
            <ul v-else>
                <li v-for="restaurant in filteredRestaurants">
                    Name: @{{restaurant.business_name}} (Genres: 
                    <strong v-for="genre in restaurant.categories">
                        - @{{genre.name}}
                    </strong>)
                </li>
            </ul> --}}
            <li class="restaurant-card" v-for="restaurant in restaurantsList">
                <a :href="'/restaurant/' + restaurant.id">
                    <div class="background-image">
                        <img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="">
                        
                        <div class="categories-card">
                            {{-- categories placeholder --}}
                            <h3>
                                @{{restaurant.business_name}}
                            </h3>
                            <ul class="categories-container">
                                <li class="category-badge" v-for="category in restaurant.categories">
                                    @{{category.name}} 
                                </li>
                            </ul>
                        </div> 
                    </div>
                    {{-- <div class="bottom-info"> --}}
                        {{-- <div class="stats">
                            <i class="fas fa-thumbs-up"></i>
                            <span>--</span>
                        </div> --}}
                    {{-- <div class="address-icon"> --}}
                            {{-- {{route('restaurantDetailsViewLink', $restaurant -> id)}} --}}
                            {{-- <a href=""><i class="fas fa-map-marker-alt"></i></a> --}}
                            {{-- <div class="address-show">
                                {{$restaurant -> address}}
                            </div> --}}
                    {{-- </div> --}}
                        {{-- {{route('restaurantDetailsViewLink', $restaurant -> id)}} --}}
                    {{-- <a href=""><i class="fas fa-utensils"></i></a>
                    <div class="delivery">
                    <img src="{{asset('/storage/assets/scooter.png')}}" alt="icona consegna">
                    <div class="delivery-checkout active">
                        &euro; 1,00
                    </div> 
                    {{-- </div> 
                    </div> --}}
                </a>   
            </li>
                
        </ul>
        <ul class="restaurants-box" v-else>
            <li class="titles-restaurant-list">
                <h2>Risultato riecerca</h2>
            </li>

            <li class="restaurant-card" v-for="restaurant in filteredRestaurants">
                <a :href="'/restaurant/' + restaurant.id">
                    <div class="background-image">
                        <img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="">
                        
                        <div class="categories-card">
                            {{-- categories placeholder --}}
                            <h3>
                                @{{restaurant.business_name}}
                            </h3>
                            <ul class="categories-container">
                                <li class="category-badge" v-for="category in restaurant.categories">
                                    @{{category.name}} 
                                </li>
                            </ul>
                        </div> 
                    </div>
                    {{-- <div class="bottom-info"> --}}
                        {{-- <div class="stats">
                            <i class="fas fa-thumbs-up"></i>
                            <span>--</span>
                        </div> --}}
                    {{-- <div class="address-icon"> --}}
                            {{-- {{route('restaurantDetailsViewLink', $restaurant -> id)}} --}}
                            {{-- <a href=""><i class="fas fa-map-marker-alt"></i></a> --}}
                            {{-- <div class="address-show">
                                {{$restaurant -> address}}
                            </div> --}}
                    {{-- </div> --}}
                        {{-- {{route('restaurantDetailsViewLink', $restaurant -> id)}} --}}
                    {{-- <a href=""><i class="fas fa-utensils"></i></a>
                    <div class="delivery">
                    <img src="{{asset('/storage/assets/scooter.png')}}" alt="icona consegna">
                    <div class="delivery-checkout active">
                        &euro; 1,00
                    </div> 
                    {{-- </div> 
                    </div> --}}
                </a>   
            </li>
        </ul>
    </div> {{-- /app search --}}
</main>
    
@endsection