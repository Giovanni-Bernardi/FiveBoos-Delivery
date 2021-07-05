@extends('layouts.restaurant-details-layout')

@section('content')
    <main class="details" id="app" v-cloak>
        <div class="details-jumbotron">
            <div class="jumbo-img" style="background-image: url('/storage/restaurant-img/{{$restaurant -> img_background}}')">
                <h2>
                    {{$restaurant -> business_name}}
                </h2>
                <div class="info-badge" id="myBtn">
                    <i class="fas fa-info"></i>
                </div>
            </div>
        </div>

        <div class="restaurant-info">
            <!-- modal popup info -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="close">
                        <i class="fas fa-times"></i>
                    </div>
                    
                    <div id="info-box">
                        <ul>
                            <li>
                                <h3>
                                    {{$restaurant -> business_name}}
                                </h3>
                            </li>
                            <li>
                                <h5>
                                    Indirizzo:
                                </h5>
                                <p>
                                    {{$restaurant -> address}}
                                </p>
                            </li>
                            <li>
                                <h5>
                                    Telefono:
                                </h5>
                                <p>
                                    {{$restaurant -> telephone}}
                                </p>
                            </li>
                            <li>
                                <h5>
                                    Descrizione:
                                </h5>
                                <p>
                                    {{$restaurant -> description}}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="dishes-box">
            <h3>
                Scegli i tuoi piatti
            </h3>
            <ul>
                <li v-for='(product, prIndex) in products' class="dish-element" v-if="product.visible">
                    <div class="left-side">
                        <h3 class="product-name">@{{product.name}}</h3>
                        <div class="add">
                            <span class="prduct-price">&euro; @{{(product.price / 100).toFixed(2) }}</span>
                            <span class="green-btn" id="to-cart" @click="addToCart(product.id, product.name, product.price, quantity)">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                    </div>
                    <div class="right-side">
                        {{-- <a href="{{route('productDetailsViewLink', @{{product.id}})}}"> --}}
                        <img :src="'/storage/product-img/' + product.img" alt="placeholder product">
                        <div class="product-info-badge" @click="popupDetails(product.id)">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="modal product-details" :class="btnID==product.id ? 'active' : ''">
                            <div class="modal-content">
                                <div class="close" @click="closePopup">
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="info-box">
                                    <ul>
                                        <li>
                                            <h3> @{{product.name}}</h3>
                                        </li>
                                        <li>
                                            <h5>Ingredienti:</h5>
                                            <p> @{{product.ingredients}}</p>
                                        </li>
                                        <li>
                                            <h5>Descrizione:</h5>
                                            <p> @{{product.description}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- </a> --}}
                    </div>
                </li>
            </ul>

            <div class="overview">
                <h3 class="checkout-title">
                    Riepilogo
                </h3>
                <div class="temp-cart">
                    <img v-if="cart == ''" src="{{asset('/storage/assets/placeholder-cart.png')}}" alt="Immagine carrello">
                    <ul class="lista-carrello">
                        <li v-if="cart == ''">
                            <p>Il tuo carrello è vuoto</p>
                        </li>
                        <li v-for='(plates, index) in cart' class="cartlist">
                            <h4 id="name-product">@{{plates.name}}</h4>
                            <div id="modification">
                                <p>x @{{plates.counter}}</p>
                                <p>&euro; @{{(plates.price * plates.counter / 100).toFixed(2)}}</p>
                                <div class="plus-minus">
                                    <i class="fas fa-plus-circle" @click="increase(plates.id, index)"></i>
                                    <i class="fas fa-minus-circle" @click="decrease(plates.id, index)"></i>
                                </div>
                            </div>
                        </li>
                        <li v-if="cart == ''"></li>
                        @{{(product.price / 100).toFixed(2) }}
                        <li v-else class="totalprice">Totale: &euro; @{{(totalPrice / 100).toFixed(2)}}</li>
                        <li v-if="cart == ''"></li>
                        <li v-else class="payment"><button type="submit" form="new-order">Check-out</button></li>

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
    </main>
    <script>
    var id = {!! json_encode($restaurant->id) !!};
    </script>
@endsection
