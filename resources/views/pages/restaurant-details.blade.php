@extends('layouts.restaurant-details-layout')

@section('content')
    <main class="details" id="app" v-cloak>
        <div class="details-jumbotron">
            <div class="jumbo-img">
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
                    <span class="close">&times;</span>
                    <div id="info-box">
                        <h3>Informazioni sul ristorante</h3>
                        <h3>
                            <i class="fas fa-user-tie"></i> {{$restaurant -> business_name}}
                        </h3>
                        <p>
                            <i class="fas fa-map-marked-alt"></i> {{$restaurant -> address}}
                        </p>
                        <p>
                            <i class="fas fa-wallet"></i> {{$restaurant -> piva}}
                        </p>
                        <p>
                            <i class="fas fa-phone-alt"></i> Chiama il ristorante <strong>{{$restaurant -> business_name}}</strong> al numero {{$restaurant -> telephone}} per prenotare un tavolo al più presto!
                        </p>
                        <p>
                            <i class="fas fa-file-alt"></i> {{$restaurant -> description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <ul>
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
        </ul> --}}


        <div class="dishes-box">
            <h3>
                Scegli i tuoi piatti
            </h3>
            <ul>
                <li v-for='(product, prIndex) in products'  v-if="product.visible">
                    <div class="left-side">
                        <h3 class="product-name">@{{product.name}}</h3>
                        {{-- <div class="description">
                            Descrizione: @{{product.description.slice(0, 45)}}...
                        </div> --}}
                        {{-- <div class="ingredients">
                            Ingredienti: @{{product.ingredients}}
                        </div> --}}
                        <div class="add">
                            <span class="prduct-price">&euro; @{{product.price}},00</span>
                            <span class="green-btn" id="to-cart" @click="addToCart(product.id, product.name, product.price, quantity)">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                    </div>
                    <div class="right-side">
                        {{-- <a href="{{route('productDetailsViewLink', @{{product.id}})}}"> --}}
                        <img src="{{asset('/storage/product-img/chicken.jpg')}}" alt="placeholder product">
                        <div class="product-info-badge">
                            <i class="fas fa-info" @click="popupDetails(product.id)"></i>
                        </div>
                        <div class="modal product-details" :class="btnID==product.id ? 'active' : ''">
                            <div class="modal-content" @click="closePopup">
                                <span class="close" @click="closePopup">&times;</span>
                                <div class="info-box">
                                    <h3> <i class="fas fa-pencil-alt"></i> @{{product.name}}</h3>
                                    <p> <i class="fas fa-utensils"></i> @{{product.ingredients}}</p>
                                    <p> <i class="fab fa-readme"></i> @{{product.description.slice(0, 45)}}...</p>
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
                    <ul>
                        <li v-if="cart == ''">
                            <p>Il tuo carrello è vuoto</p>
                        </li>
                        <li v-for='(plates, index) in cart' class="cartlist">
                            <h4 id="name-product">@{{plates.name}}</h4>
                            <div id="modification">
                                <p>x @{{plates.counter}}</p>
                                <p>&euro; @{{plates.price * plates.counter}},00</p>
                                <div class="plus-minus">
                                    <i class="fas fa-plus-circle" @click="increase(plates.id, index)"></i>
                                    <i class="fas fa-minus-circle" @click="decrease(plates.id, index)"></i>
                                </div>
                            </div>
                        </li>
                        <li v-if="cart == ''"></li>
                        <li v-else class="totalprice">Totale: &euro;@{{totalPrice}},00</li>
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
