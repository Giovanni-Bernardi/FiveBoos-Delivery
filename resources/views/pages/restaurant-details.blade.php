@extends('layouts.main-layout')

@section('content')
    <main>
        <h2></h2>
        <ul>
            <li>
                <h4>
                    Restaurant '{{$restaurant -> business_name}}' details
                </h4>
            </li>
            <li>
                Business name: {{$restaurant -> business_name}}
            </li>
            <li>
                Address: {{$restaurant -> address}}
            </li>
            <li>
                P-IVA: {{$restaurant -> piva}}
            </li>
            <li>
                Telephone: {{$restaurant -> telephone}}
            </li>
            <li>
                Description: {{$restaurant -> description}}
            </li>
            <li>
                <u>
                    Owner: {{$restaurant -> user -> email}}
                </u>
            </li>
            <li>
                <a href="{{route('editRestaurantViewLink', $restaurant -> id)}}">Edit this restaurant</a>
            </li>
            <li>
                <a href="{{route('deleteRestaurantLink', $restaurant -> id)}}">Delete this restaurant</a>
            </li>
        </ul>

        <hr>

        <ul>
            <li>
                <h4>
                    Products list:
                </h4>
            </li>
            @foreach ($restaurant -> products as $product)
                <li>
                    {{$product -> name}}: &euro;{{$product -> price}},00
                    <a href="{{route('productDetailsViewLink', $product -> id)}}">
                        details
                    </a>
                </li>
            @endforeach
        </ul>

        
        <h3>
            <a href="{{route('statsMonthLink', $restaurant -> id)}}">Statistics Chart Details: CLICK HERE</a>
        </h3>
        <div id="appChart" style="width: 50%">
            <input name="d_elem" type="hidden" value="{{$restaurant -> id}}" id="d_elem"/>
            <button v-on:click="getMonthsData()">STATS</button>

            {{-- -------------- FAKE CHART ---------------- --}}
            <h5 style="margin-top: 50px">&#11015; Fake Chart &#11015;</h5>
            <canvas id="myChart">
                Your browser does not support the canvas element.
            </canvas>
        </div>
    </main>
@endsection