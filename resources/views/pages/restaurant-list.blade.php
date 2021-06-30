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
                            <input type="checkbox" name="" class="" :value="category.id" v-model="filter" v-on:change="getFilteredRestaurant()">
                            <img :src="'/storage/assets/' + category.img" alt="pizza" :id="category.name">
                            <p class="cat-name">@{{category.name}}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        {{-- <div class="titles-restaurant-list">
            
        </div> --}}

        <ul class="restaurants-box">
            <li v-if="filter == false" class="titles-restaurant-list">
                <h2>Ristoranti in zona</h2>
            </li>
            <li v-else class="titles-restaurant-list">
                <h2>Risultato ricerca</h2>
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
            <li class="restaurant-card" v-for="restaurant in filteredRestaurants">
                <a :href="'/restaurant/' + restaurant.id">
                    <div class="background-image">
                        <img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="">
                        
                        <div class="categories-card">
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
                </a>   
            </li>
                
        </ul>
        {{-- <ul class="restaurants-box" v-else>
            <li class="titles-restaurant-list">
                <h2>Risultato riecerca</h2>
            </li>

            <li class="restaurant-card" v-for="restaurant in filteredRestaurants">
                <a :href="'/restaurant/' + restaurant.id">
                    <div class="background-image">
                        <img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="">
                        
                        <div class="categories-card">
                            {{-- categories placeholder --}}
                            {{-- <h3>
                                @{{restaurant.business_name}}
                            </h3>
                            <ul class="categories-container">
                                <li class="category-badge" v-for="category in restaurant.categories">
                                    @{{category.name}} 
                                </li>
                            </ul>
                        </div> 
                    </div>
                </a>   
            </li>
        </ul> --}}
    </div>
</main>
    
@endsection