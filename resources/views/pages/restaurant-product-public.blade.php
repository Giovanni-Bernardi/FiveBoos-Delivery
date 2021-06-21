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
        </ul>

        <hr>

        <ul>
            <li>
                <h4>
                    Products list:
                </h4>
            </li>

            <li v-for='(product, prIndex) in products' v-if="product.restaurant_id == currentRestaurantId">
                <div>
                    <div>ID: @{{product.id}}</div>
                    <div>Name: @{{product.name}}</div>
                    <div>Price: @{{product.price}} €</div>
                    <div>IdRestaurant: @{{product.restaurant_id}}</div>
                    {{-- <div>Quantita: @{{quantity}}</div>
                    <button @click="increase(prIndex)">+</button>
                    <button @click="decrease(prIndex)">-</button> --}}
                    <div>Ingredients: @{{product.ingredients}}</div>
                    <div>Description: @{{product.description}}</div>
                    <div>
                        <button type="button" @click="addToCart(product.id, product.name, product.price)">Add to Cart</button>
                    </div>

                </div>
            </li>
            <li><h1>Carello</h1></li>
            <li v-for='(car, index) in cart'>
                <div>ID: @{{car.id}}</div>
                <div>Name: @{{car.name}}</div>
                <div>Price: @{{car.price}} €</div>
                <div>Quantita: @{{car.counter}}</div>
                <button @click="increase(index)">+</button>
                <button @click="decrease(index)">-</button>
                <br>
            </li>
            <li>totalPrice: @{{totalPrice * car.counter}} €</li>
        </ul>

    </main>
@endsection
<script>
    var id = {!! json_encode($restaurant->id) !!};
</script>
