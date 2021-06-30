@extends('layouts.restaurant-profile-details-layout')

@section('content')
    <main class="user details">
    {{-- Controllo se User esiste --}}
    @if (Auth::check())
    {{-- Controllo se User è il porprietario --}}
        @if (Auth::user()->id == $restaurant -> user_id)
        <div id="app" v-cloak>
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
                    I tuoi piatti
                </h3>
                <ul>
                    @foreach ($restaurant -> products as $product)
                        
                    <li>
                        <div class="left-side">
                            <h3 class="product-name">{{$product -> name}}</h3> 
                            <div class="add">
                                <span class="prduct-price">&euro; {{$product -> price}},00</span>
                            </div>
                        </div>
                        <div class="right-side">
                            <img src="{{asset('/storage/product-img/chicken.jpg')}}" alt="placeholder product">
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
                

        <div id="appChart">
            {{-- <h3>
                <a href="{{route('statsMonthLink', ['restaurantId' => $restaurant -> id, 'selectedYear' => 2020, 'type' => 0])}}">Statistics Chart Route: CLICK HERE</a>
            </h3> --}}
            <h3>
                Grafici ristorante
            </h3>
            <input name="d_elem" type="hidden" value="{{$restaurant -> id}}" id="d_elem"/>
            
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
    
            {{-- -------------- CHART ---------------- --}}
            <canvas id="myChart">
                Your browser does not support the canvas element.
            </canvas>
        </div>
        @else
        <h2>Non sei il porprietario!</h2>
        @endif
    @endif

    <h3>Storico Ordini</h3>
    <div class="orders-tab">
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
                            @foreach ($order -> products as $product) 
                            <li>
                                {{$product -> name}}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$order -> total_price}}</td>
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
    </div>
    </main>
@endsection
