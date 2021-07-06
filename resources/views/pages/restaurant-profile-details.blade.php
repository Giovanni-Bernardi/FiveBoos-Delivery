@extends('layouts.restaurant-profile-details-layout')

@section('content')
    <main class="user details">
    {{-- Controllo se User esiste --}}
    @if (Auth::check())
        {{-- Controllo se User è il porprietario --}}
        @if (Auth::user()->id == $restaurant -> user_id)
            <div id="app" v-cloak>
                <div class="details-jumbotron">
                    <div class="jumbo-img" style="background-image: url('/storage/restaurant-img/{{$restaurant -> img_background}}')">
                        <h2>
                            {{$restaurant -> business_name}}
                        </h2>
                        <div class="info-badge" id="myBtn">
                            <i class="fas fa-cog"></i>
                        </div>
                    </div>
                </div>

                <div class="restaurant-info">
                    <!-- modal popup info -->
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <div id="info-box">
                                <form  method="POST" action="{{ route('updateRestaurantViewLink', $restaurant -> id) }}" enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="title-card">
                                        <img src="{{asset('/storage/assets/site-logo/loader.svg')}}" alt="logo">
                                        <h4>
                                            {{$restaurant -> business_name}}
                                        </h4>
                                    </div>
                                    <ul>

                                        <li>
                                            <label for="business_name"> Nome:</label>
                                            <input type="text" name="business_name" required value="{{$restaurant -> business_name}}">
                                        </li>
                                        <li>
                                            <label for="address">
                                                Indirizzo:
                                            </label>
                                            <textarea name="address" required spellcheck="false" cols="50" rows="2">{{$restaurant -> address}}</textarea>
                                        </li>

                                        <li>
                                            <label for="piva">
                                                P-IVA:
                                            </label>
                                            <input type="text" name="piva" required value="{{$restaurant -> piva}}">
                                        </li>

                                        <li>
                                            <label for="telephone">
                                                Recapito telefonico:
                                            </label>
                                            <input type="text" name="telephone" required value="{{$restaurant -> telephone}}">
                                        </li>

                                        <li>
                                            <label for="description">
                                                Descrizione:
                                            </label>
                                            <textarea name="description" cols="50" spellcheck="false" rows="7">{{$restaurant -> description}}</textarea>
                                        </li>

                                        <li>
                                            <label for="img">
                                                Immagine principale:
                                                {{-- <img src="{{asset ('storage/restaurant-img/' . $restaurant -> img)}}" alt="" width="100px"> --}}
                                            </label>
                                            <input type="file" name="img">
                                        </li>

                                        <li>
                                            <label for="img">
                                                Immagine banner:
                                                {{-- <img src="{{asset ('storage/restaurant-img/' . $restaurant -> img)}}" alt="" width="100px"> --}}
                                            </label>
                                            <input type="file" name="img_background">
                                        </li>

                                        <li>
                                            <label>Categorie (min. 1, max. 3):</label>
                                            <div>
                                                <ul class="category-box">
                                                    @foreach ($categories as $category)
                                                        <li>
                                                            <div class="edit-prod">
                                                                <input type="checkbox" id="cat-{{$category -> id}}" name="category_id[]" value="{{$category -> id}}"
                                                                @foreach ($restaurant -> categories as $restaurantType)
                                                                    @if ($restaurantType -> id == $category -> id)
                                                                        checked
                                                                    @endif
                                                                @endforeach>
                                                                <label for="cat-{{$category -> id}}" class="circle"></label>
                                                                <label for="cat-{{$category -> id}}" class="name-category">
                                                                    {{$category -> name}}
                                                                </label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <button type="submit">Salva</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dishes-box">
                    <h3>
                        I tuoi piatti
                    </h3>
                    <ul>
                        @foreach ($restaurant -> products as $product)
                            @if (!$product -> deleted)
                                <li class="dish-element @if(!$product -> visible) hide @endif">
                                    <div class="left-side">
                                        <h3 class="product-name">{{$product -> name}}</h3>
                                        <div class="add">
                                            <span class="prduct-price">&euro; {{number_format($prezzo = (floatval($product -> price / 100 )), 2)}}</span>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <img src="{{asset('/storage/product-img/' . $product -> img)}}" alt="placeholder product">
        
                                        <div class="info-badge edit-product" @click="popupDetails({{$product -> id}})">
                                            <i class="fas fa-cog" ></i>
                                        </div>
        
                                        <div class="info-badge hide-product">
                                            <a href="{{route('deleteProductLink', $product -> id)}}">
                                                @if ($product -> visible)
                                                    <i class="fas fa-eye"></i>
                                                @else
                                                    <i class="fas fa-eye-slash"></i>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="info-badge delete-product">
                                            <a href="{{route('realDeleteProductLink', $product -> id)}}"
                                            >
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="modal product-edit" :class="btnID == {{$product -> id}} ? 'active' : ''">
                                        <div class="modal-content" >
                                            <span class="close" @click="closePopup">&times;</span>
                                            <div class="info-box">
                                                <form  method="POST" action="{{route('updateProductViewLink', $product -> id)}}" enctype="multipart/form-data" >
                                                    @method('POST')
                                                    @csrf
                                                    <div class="title-card">
                                                        <img id="img-edit-product" class="img-edit" src="{{asset('/storage/assets/site-logo/loader.svg')}}" alt="logo">
                                                        <h4>{{$product -> name}}  </h4>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <label for="name">
                                                                Nome:
                                                            </label>
                                                            <input type="text" name="name" value="{{$product -> name}}">
                                                        </li>
        
                                                        <li>
                                                            <label for="ingredients">
                                                                Ingredienti:
                                                            </label>
                                                            <textarea name="ingredients" spellcheck="false" cols="40" rows="5">{{$product -> ingredients}}</textarea>
                                                        </li>
        
                                                        <li>
                                                            <label for="description">
                                                                Descrizione:
                                                            </label>
                                                            <textarea name="description" spellcheck="false" cols="40" rows="5">{{$product -> description}}</textarea>
                                                        </li>
        
                                                        <li>
                                                            <label for="price">
                                                                Prezzo (in centesimi):
                                                            </label>
                                                            <input type="text" name="price" value="{{$product -> price}}">
                                                        </li>
        
                                                        <li>
                                                            <label for="img">
                                                                Immagine:
                                                            </label>
                                                            <input type="file" name="img" value="{{$product -> img}}">
                                                        </li>
        
                                                        <li>
                                                            <button type="submit">Salva</button>
                                                        </li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                            @endif
                        @endforeach
                        <li id="new-product" class="new-product dish-element">
                            <div class="add-new" @click="popupCreate">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="modal create-product" :class="btnID == 'create' ? 'active' : ''">
                                <div class="modal-content">
                                    <span class="close" @click="closePopup">&times;</span>
                                    <div class="info-box">
                                        <form method="POST" enctype="multipart/form-data" action="{{ route('storeProduct', $restaurant -> id) }}">
                                            @method('POST')
                                            @csrf
                                            <div class="title-card">
                                                <img src="{{asset('/storage/assets/site-logo/loader.svg')}}" alt="logo">
                                                <h4>Crea un piatto</h4>
                                            </div>
                                            <ul>
                                                <li>
                                                    <label for="name">
                                                        Nome:
                                                    </label>
                                                    <input type="text" name="name" placeholder="nome" required>
                                                </li>

                                                <li>
                                                    <label for="ingredients">
                                                        Ingredienti:
                                                    </label>
                                                    <textarea name="ingredients" id="" spellcheck="false" cols="30" rows="10" placeholder="Inserisci qui gli ingredienti" required > </textarea>
                                                </li>

                                                <li>
                                                    <label for="description">
                                                        Descrizione:
                                                    </label>
                                                    <textarea name="description" id="" cols="30" rows="10"  placeholder="Inserisci una breve descrizione del piatto/allergeni" required> </textarea>
                                                </li>

                                                <li>
                                                    <label for="price">
                                                        Prezzo (in centesimi):
                                                    </label>
                                                    <input type="number" name="price" placeholder="prezzo" required>
                                                </li>

                                                <li>
                                                    <label for="img">
                                                        Immagine:
                                                    </label>
                                                    <input type="file" name="img">
                                                </li>

                                                {{-- <li class="visibility">

                                                    <label for="visible">
                                                        Disponibilità
                                                    </label>
                                                    <input type="radio" name="visible" value="0">No
                                                    <input type="radio" name="visible" value="1">Si
                                                </li> --}}

                                                <li>
                                                    <button type="submit">Crea piatto</button>
                                                </li>

                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <section id="appChart">
                {{-- <h3>
                    <a href="{{route('statsMonthLink', ['restaurantId' => $restaurant -> id, 'selectedYear' => 2020, 'type' => 0])}}">Statistics Chart Route: CLICK HERE</a>
                </h3> --}}
                <h3>
                    Grafici ristorante
                </h3>
                <input name="d_elem" type="hidden" value="{{$restaurant -> id}}" id="d_elem"/>

                <div class="options">
                    <label for="year">Anno:</label>

                    <select name="year" id="yearOrder" v-model="year" v-on:change="updateMonthsChart()">
                        <option :value="currentYear">@{{currentYear}}</option>
                        <option :value="currentYear - 1">@{{currentYear - 1}}</option>
                        <option :value="currentYear - 2">@{{currentYear - 2}}</option>
                    </select>

                    <label for="type0">N° Ordini</label>
                    <input type="radio" name="type1" id="" value="0" checked v-model="type" v-on:change="updateMonthsChart()">

                    <label for="type0">Saldo</label>
                    <input type="radio" name="type" id="" value="1" v-model="type" v-on:change="updateMonthsChart()">
                </div>


                {{-- -------------- CHART ---------------- --}}
                <canvas id="myChart">
                    Your browser does not support the canvas element.
                </canvas>
            </section>

            {{-- Doppia sezione orders per avere scroll lungo solo come tab --}}
            <section class="orders-tab title">
                <h3>Storico Ordini</h3>
            </section>
            <section class="orders-tab">
                @if (count($orders) > 0)
                    <table>
                        <tr>
                            <th>ID Ordine</th>
                            <th>Data</th>
                            <th>Prodotti</th>
                            <th>Totale &euro;</th>
                            <th>Stato</th>
                        </tr>

                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order -> id}}</td>
                                <td>{{$order -> delivery_date}}</td>
                                <td>
                                    <ul>
                                        @php
                                            $products = [];
                                            for ($i=0; $i < count($order -> products) ; $i++) { 
                                                if($i == 0){
                                                    $products[$i] ['id'] = $order -> products[$i] -> id;
                                                    $products[$i] ['name'] = $order -> products[$i] -> name;
                                                    $products[$i] ['price'] = $order -> products[$i] -> price;
                                                    $products[$i] ['count'] = 1;
                                                    
                                                }
                                                else if($order -> products[$i] -> id == $products[count($products) - 1]['id']){
                                                    $products[count($products) - 1]['count'] ++;
                                                }
                                                else{
                                                    $products[count($products)] ['id'] = $order -> products[$i] -> id;
                                                    $products[count($products) - 1] ['name'] = $order -> products[$i] -> name;
                                                    $products[count($products) - 1] ['price'] = $order -> products[$i] -> price;
                                                    $products[count($products) - 1] ['count'] = 1;
                                                }
                                            }
                                        @endphp
                                        @foreach ($products as $product)
                                            <li>
                                                {{$product['name']}} &#10799; {{$product['count']}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{number_format($total = floatval($order -> total_price / 100), 2)}}</td>
                                <td>
                                    @if ($order -> payment_status)
                                        Pagato
                                    @else
                                        In attesa
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    
                @else
                    <p>Non hai ancora ricevuto alcun ordine</p>
                @endif
            </section>

            @else
            <h2>Non sei il porprietario!</h2>
            @endif
        @endif
    </main>
@endsection
