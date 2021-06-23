@extends('layouts.restaurant-details-layout')

@section('content')
    <main class="details">
        <div class="details-jumbotron">
        </div>
        <div class="restaurant-info">
            <h2>
                Restaurant '{{$restaurant -> business_name}}' details
            </h2>
            <div id="info">
                {{-- <button>Mostra Altro</button> --}}
                <!-- modal popup info -->
                <button id="myBtn">Mostra Altro</button>
                <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div id="info-box">
                        <p>
                            Business name: {{$restaurant -> business_name}}
                        </p>
                        <p>
                            Address: {{$restaurant -> address}}
                        </p>
                        <p>
                            P-IVA: {{$restaurant -> piva}}
                        </p>
                        <p>
                            Telephone: {{$restaurant -> telephone}}
                        </p>
                        <p>
                            Description: {{$restaurant -> description}}
                        </p>
                    </div>
                </div>
                </div>
            </div>
            <div class="overview">
                <div class="checkout-button">
                    <a href="">Vai alla Cassa</a>
                </div>
                <div class="temp-cart">
                    <p>Il tuo carrello è vuoto</p>
                </div>
            </div>
        </div>
        <ul>
            {{-- <li>
                Categories: 
            </li>
            @foreach ($restaurant -> categories as $category)
            <li>
                {{$category -> name}}
            </li>
            @endforeach

            @if (Auth::check())
                @if (Auth::user()->id == $restaurant -> user_id)
                    <li>
                        <a href="{{route('editRestaurantViewLink', $restaurant -> id)}}">Edit this restaurant</a>
                    </li>
                    <li>
                        <a href="{{route('deleteRestaurantLink', $restaurant -> id)}}">Delete this restaurant</a>
                    </li>
                @endif
            @endif
        </ul>
        
        <hr>
        <div class="dishes-box">
            <h4>
                Products list:
            </h4>
            <ul>
                @foreach ($restaurant -> products as $product)
                <li>
                    <div class="dish @if(!($product -> visible)) unavailable @endif" >
                        {{-- @if(!($product -> visible)) 
                            <div class="unavailable-dish">
                                <h3>Non disponibile</h3>
                            </div> 
                        @endif --}}
                        <div class="left-side">
                            <span class="product-name">{{$product -> name}}:</span> <span class="prduct-price">&euro;{{$product -> price}},00</span>
                            <div class="description">
                                Breve descrizione del piatto
                            </div>
                            <div class="ingredients">
                                <ul>
                                    <li>ingrediente, </li>
                                    <li>ingrediente,</li>
                                    <li>ingrediente</li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="right-side">
                            <a href="{{route('productDetailsViewLink', $product -> id)}}">
                                <img src="{{asset('/storage/placeholder/product.png')}}" alt="placeholder product">
                            </a>
                        </div>
                            {{-- details --}}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        
        {{-- Controllo se User esiste --}}
        @if (Auth::check())
            {{-- Controllo se User è il porprietario --}}
            @if (Auth::user()->id == $restaurant -> user_id)
                <h3>
                    <a href="{{route('statsMonthLink', ['restaurantId' => $restaurant -> id, 'selectedYear' => 2020])}}">Statistics Chart Route: CLICK HERE</a>
                </h3>
                <div id="appChart" style="width: 60%">
                    <input name="d_elem" type="hidden" value="{{$restaurant -> id}}" id="d_elem"/>

                    <select name="year" id="yearOrder" v-model="year" v-on:change="updateMonthsChart()">
                        <option :value="currentYear">@{{currentYear}}</option>
                        <option :value="currentYear - 1">@{{currentYear - 1}}</option>
                        <option :value="currentYear - 2">@{{currentYear - 2}}</option>
                    </select>

                    {{-- -------------- CHART ---------------- --}}
                    <canvas id="myChart">
                        Your browser does not support the canvas element.
                    </canvas>
                </div>
            @endif
        @endif
        <p>
            <u>
                Owner: {{$restaurant -> user -> email}}
            </u>
        </p>
    
    </main>
    {{-- <script>
            function PopupModal(){
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
        modal.style.display = "block";
        }
        span.onclick = function() {
        modal.style.display = "none";
        }
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    }
    document.addEventListener('DOMContentLoaded', PopupModal);
    </script> --}}
    @endsection
    