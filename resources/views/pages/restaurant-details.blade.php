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
            {{-- @foreach ($restaurant -> products as $product)
                <li>
                    {{$product -> name}}: &euro;{{$product -> price}},00
                    <a href="{{route('productDetailsViewLink', $product -> id)}}">
                        details
                    </a>
                </li>
            @endforeach --}}

            {{-- @foreach ($restaurant -> products as $product)
                <li>
                    <product-component :product="{{$product}}"></product-component>
                </li>
            @endforeach --}}
            <li v-for='(product, productIndex) in products' v-if="product.restaurant_id == currentRestaurantId">
                <div>
                    <div>ID: @{{product.id}}</div>
                    <div>Name: @{{product.name}}</div>
                    <div>Price: @{{product.price}}</div>
                    <div>IdRestaurant: @{{product.restaurant_id}}</div>
                    <div>Quantita: @{{quantity}}</div>
                    <button @click="increase">+</button>
                    <button @click="decrease">-</button>
                    <div>Ingredients: @{{product.ingredients}}</div>
                    <div>Description: @{{product.description}}</div>
                    {{-- <div v-show='visibility'>
                        <div>Ingredients: @{{product.ingredients}}</div>
                        <div>Description: @{{product.description}}</div>
                    </div>
                    <div class="">
                        <button type="button" @click='visibility = !visibility'>Show More Info</button>
                    </div> --}}
                    <div class="">
                        <button type="button" @click='addToCart'>Add to Cart</button>
                    </div>
                    {{-- <button type="button" @click='visibility = !visibility'>Show More Info</button> --}}
                    {{-- <div v-if="product.restaurant_id == currentRestaurantId">
                        @foreach ($restaurant -> products as $product)
                            @if ($product)
                                <a href="{{route('productDetailsViewLink', $product -> id)}}">details</a>
                            @endif
                        @endforeach
                    </div> --}}
                </div>
            </li>
        </ul>

    </main>
@endsection
<script>
    var id = {!! json_encode($restaurant->id) !!};
</script>
