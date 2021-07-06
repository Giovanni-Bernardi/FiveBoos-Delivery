@extends('layouts.search-layout')

@include('components.search-header')
@include('components.preloader')
@include('components.back-to-top')
    
@section('content')
<main>
    {{-- VUE Riecerca dinamica --}}
    <div id="appSearch"> 
        {{-- Filtro categorie --}}
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

        {{-- Lista ristoranti dinamica - ricerca veloce --}}
        <ul class="restaurants-box">
            <li v-if="filter == false" class="titles-restaurant-list">
                <h2>Ristoranti in zona</h2>
            </li>
            <li v-else class="titles-restaurant-list">
                <h2>Risultato ricerca</h2>
            </li>
            <li class="restaurant-card .dish-element" v-for="restaurant in filteredRestaurants" v-if="restaurant.visible">
                <a :href="'/restaurant/' + restaurant.id">
                    <div class="background-image">
                        <img :src="'/storage/restaurant-img/' + restaurant.img" alt="">
                        
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
            <li v-if="filteredRestaurants.length < 1 " style="padding-left: 10px">
                <p>Nessun ristorante trovato</p>
            </li>
        </ul>
    </div>
</main>

<script>
    window.landingFilter = {{$filter}};
    console.log('PREFILTRO:' + window.landingFilter);
</script>
    
@endsection