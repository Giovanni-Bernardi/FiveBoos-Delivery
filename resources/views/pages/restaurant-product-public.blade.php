@extends('layouts.chart-layout')

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

            <li v-for='(product, prIndex) in products'>
                <div>
                    <div>ID: @{{product.id}}</div>
                    <div>Name: @{{product.name}}</div>
                    <div>Price: @{{product.price}} €</div>
                    <div>IdRestaurant: @{{product.restaurant_id}}</div>
                    <div>Ingredients: @{{product.ingredients}}</div>
                    <div>Description: @{{product.description}}</div>
                    <div>
                        <button type="button" @click="addToCart(product.id, product.name, product.price, quantity)">Add to Cart</button>
                    </div>

                </div>
            </li>
            <li><h1>Carello</h1></li>
            <li v-for='(plates, index) in cart'>
                <div>ID: @{{plates.id}}</div>
                <div>Name: @{{plates.name}}</div>
                <div>Price: @{{plates.price}} €</div>
                <div>Quantita: @{{plates.counter}}</div>
                <button @click="increase(plates.id, index)">+</button>
                <button @click="decrease(plates.id, index)">-</button>
                <br>
            </li>
            <li>totalPrice: @{{totalPrice}}</li>
        </ul>
        <form method="POST" action="{{ route('storeOrder') }}" >
            @csrf
            @method('POST')

            <h1 class="text-center">New Order:</h1>
            <ul>

              <li>
                <h2>firstname</h2>
                <div>
                  <input type="text" name="firstname" placeholder="firstname" required>
                </div>
              </li>

              <li>
                <h2>lastname</h2>
                <div>
                  <input type="text" name="lastname" placeholder="lastname" required>
                </div>
              </li>

              <li>
                <h2>email</h2>
                <div>
                  <input type="text" name="email" placeholder="email" required>
                </div>
              </li>

              <li>
                <h2>telephone</h2>
                <div>
                  <input type="text" name="telephone" placeholder="telephone" required>
                </div>
              </li>

              <li>
                <h2>address</h2>
                <div>
                  <input type="text" name="address" placeholder="address" required>
                </div>
              </li>

              <li>
                <h2>delivery_date</h2>
                <div>
                  <input type="date" name="delivery_date" required>
                  <input type="time" name="delivery_time" required>
                </div>
              </li>

                <li style="display:none">
                  <h2>Product</h2>
                  <div class="checkboxing">
                    <input v-for="product in numberProduct" type="checkbox" name="products_id[]" :value="product" checked>
                  </div>
                </li>

            </ul>

            <div class="button-center">
              <button type="submit" class="home">Go to payment</button>
              {{-- <a class="home" href="{{route('home')}}">List Cars</a> --}}
            </div>

        </form>

    </main>
@endsection
<script>
    var id = {!! json_encode($restaurant->id) !!};
</script>
