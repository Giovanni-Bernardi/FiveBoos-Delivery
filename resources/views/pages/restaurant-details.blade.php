@extends('layouts.restaurant-details-layout')

@section('content')
    <main class="details" id="app" v-cloak >
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
                    <ul>
                        <li v-if="cart == ''">
                            <p>Il tuo carrello è vuoto</p>
                        </li>
                        <li v-for='(plates, index) in cart' class="cartlist">
                            <div id="name-product">@{{plates.name}}</div>
                            <div id="modification">
                                <div>X@{{plates.counter}}</div>
                                <div>@{{plates.price * plates.counter}} €</div>
                                <div>
                                    <i class="fas fa-plus-square" @click="increase(plates.id, index)"></i>
                                    <i class="fas fa-minus-square" @click="decrease(plates.id, index)"></i>
                                </div>
                            </div>
                            <br>
                        </li>
                        <li v-if="cart == ''"></li>
                        <li v-else class="totalprice">Totale: &euro;@{{totalPrice}}</li>
                        <li v-if="cart == ''"></li>
                        <li v-else class="payment"><button type="submit" form="new-order">Pagamento</button></li>

                    </ul>
                    <form style="display:none" method="POST" action="{{ route('storeOrder') }}" id="new-order">
                        @csrf
                        @method('POST')
                            <input type="text" name="firstname" placeholder="firstname" value="Nan" required>
                            <input type="text" name="lastname" placeholder="lastname" value="Nan" required>
                            <input type="text" name="email" placeholder="email" value="Nan" required>
                            <input type="text" name="telephone" placeholder="telephone" value="Nan" required>
                            <input type="text" name="address" placeholder="address" value="Nan" required>
                            <input type="date" name="delivery_date" value="2021-06-25" required>
                            <input type="time" name="delivery_time" value="12:00" required>
                            <input v-for="product in numberProduct" type="checkbox" name="products_id[]" :value="product" checked>
                    </form>
                </div>
            </div>
        </div>
        <ul>
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
                <li v-for='(product, prIndex) in products'>
                    <div class="dish">
                        {{-- @if(!($product -> visible))
                             <div class="unavailable-dish">
                                <h3>Non disponibile</h3>
                            </div>
                        @endif --}}
                        <div class="left-side">
                            <span class="product-name">@{{product.name}}:</span> <span class="prduct-price">&euro;@{{product.price}},00</span>
                            <div class="description">
                                Descrizione: @{{product.description.slice(0, 45)}}...
                            </div>
                            <div class="ingredients">
                                Ingredienti: @{{product.ingredients}}
                            </div>
                            <div class="button-add">
                                <button id="to-cart" type="button" @click="addToCart(product.id, product.name, product.price, quantity)">Aggiungi in carello</button>
                            </div>
                        </div>
                        <div class="right-side">
                            {{-- <a href="{{route('productDetailsViewLink', @{{product.id}})}}"> --}}
                                <img src="{{asset('/storage/placeholder/product.png')}}" alt="placeholder product">
                            {{-- </a> --}}
                        </div>
                    </div>
                </li>
                {{-- @foreach ($restaurant -> products as $product)
                <li>
                    <div class="dish @if(!($product -> visible)) unavailable @endif" >
                        @if(!($product -> visible))
                             <div class="unavailable-dish">
                                <h3>Non disponibile</h3>
                            </div>
                        @endif
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
                             details
                    </div>
                </li>
                @endforeach --}}
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
                Proprietario di questo Ristorante: {{$restaurant -> user -> email}}
            </u>
        </p>

    </main>
    <script>
        var id = {!! json_encode($restaurant->id) !!};
    </script>
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
