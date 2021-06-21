@extends('layouts.main-layout')

@section('content')
    <main>
        <!-- {{-- landing page --}} -->
                <section id="landing-jumbo">
                    <div id="background-jumbo">
                        <div id="landing-title">
                            <h1>
                                Hungry?
                            </h1>
                            <h2>
                                your favourite food delivered in 20 minutes
                            </h2>
                            <div class="landing-buttons">
                                <a id="white-button" href="#">ORDER NOW</a> <!-- aggiungere la route -->
                                <span>or</span>
                                <a id="dotted-button" href="#">SELECT A FOOD ICON</a> <!-- no route -->
                            </div>
                        </div>
                        <!-- types -->
                        <div class="type popup-note scale" id="pizzeria">
                            <a href="">
                                <img class="" src="{{asset('/storage/assets/pizza.png')}}" alt="pizza">
                            </a>
                            <a class="pop" href="#">Pizza</a>
                        </div>
                        <div class="type popup-note scale" id="fastfood">
                            <a href="">
                                <img src="{{asset('/storage/assets/hamburger.png')}}" alt="">
                            </a>
                            <a class="pop" href="#">Fast food</a>
                        </div>
                        <div class="type popup-note scale" id="sushi">
                            <a href="">
                                <img src="{{asset('/storage/assets/sushi.png')}}" alt="">
                            </a>
                            <a class="pop" href="#">Sushi</a>
                        </div>
                        <div class="type popup-note scale" id="messicano">
                            <a href="">
                                <img src="{{asset('/storage/assets/mexican.png')}}" alt="">
                            </a>
                            <a class="pop popup-note" href="#">Messicano</a>
                        </div>
                        <div class="type popup-note scale" id="cinese">
                            <a href="">
                                <img src="{{asset('/storage/assets/japanese.png')}}" alt="">
                            </a>
                            <a class="pop right" href="#">Cinese</a>
                        </div>
                        <div class="type popup-note scale" id="carne">
                            <a href="">
                                <img src="{{asset('/storage/assets/meat.png')}}" alt="">
                            </a>
                            <a class="pop up" href="#">Carne</a>
                        </div>
                        <div class="type popup-note scale" id="pesce">
                            <a href="">
                                <img src="{{asset('/storage/assets/fish.png')}}" alt="">
                            </a>
                            <a class="pop" href="#">Pesce</a>
                        </div>
                        <div class="type popup-note scale" id="poke">
                            <a href="">
                                <img src="{{asset('/storage/assets/veg.png')}}" alt="">
                            </a>
                            <a class="pop" href="#">Poke</a>
                        </div>
                        <div class="type popup-note scale" id="pasticceria">
                            <a href="">
                                <img src="{{asset('/storage/assets/cake.png')}}" alt="">
                            </a>
                            <a class="pop right" href="#">Bakery</a>
                        </div>
                        <div class="type popup-note scale" id="vegan">
                            <a href="">
                                <img src="{{asset('/storage/assets/apple.png')}}" alt="">
                            </a>
                            <a class="pop up" href="#">Vegan</a>
                        </div>
                        <lottie-player id="lottie-player"
                        src="https://assets8.lottiefiles.com/packages/lf20_kh7lwZ.json"  
                        background="transparent"  
                        speed="0.5"  
                        loop autoplay
                        >
                   </lottie-player>
                   <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    </div> <!-- /background-jumbo -->
                </section> <!-- /landing-jumbo -->

        <!-- {{-- restaurant list --}} -->
        <div class="jumbo-list">
            <div class="placeholder-categories">
                <h2>qui andranno le categories per la ricerca dinamica</h2>
                {{-- slider carousel 1--}}
            </div>
            <div class="carousel-2">
                <ul>
                    <li class="food-type">
                        <label for="type-pizza"><img src="{{asset('/storage/assets/pizza.png')}}" alt=""></label>
                        <input type="checkbox" name="type-pizza" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-sushi"><img src="{{asset('/storage/assets/sushi.png')}}" alt=""></label>
                        <input type="checkbox" name="type-sushi" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-spaghetti"><img src="{{asset('/storage/assets/japanese.png')}}" alt=""></label>
                        <input type="checkbox" name="type-japanese" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-desserts"><img src="{{asset('/storage/assets/desserts.png')}}" alt=""></label>
                        <input type="checkbox" name="type-desserts" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-meat"><img src="{{asset('/storage/assets/meat.png')}}" alt=""></label>
                        <input type="checkbox" name="type-meat" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-american"><img src="{{asset('/storage/assets/american.png')}}" alt=""></label>
                        <input type="checkbox" name="type-american" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-snack"><img src="{{asset('/storage/assets/snack.png')}}" alt=""></label>
                        <input type="checkbox" name="type-snack" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-mexican"><img src="{{asset('/storage/assets/mexican.png')}}" alt=""></label>
                        <input type="checkbox" name="type-mexican" class="type-check">
                    </li>
                    <li class="food-type">
                        <label for="type-cake"><img src="{{asset('/storage/assets/cake.png')}}" alt=""></label>
                        <input type="checkbox" name="type-cake" class="type-check">
                    </li>
                </ul>
            </div>
        </div>
        <div class="titles-restaurant-list">
            <h2 id="title">Delivery</h2>
            <h4>
                Scegli il ristorante: 
            </h4>
        </div>
        <div class="restaurants-box">
        
            @foreach ($restaurants->take(12) as $restaurant)
                <div class="restaurant-card">
                    <div class="top-info">
                        <div class="background-image"></div>
                        <a href="{{route('restaurantDetailsViewLink', $restaurant -> id)}}"> {{$restaurant -> business_name}} </a>
                        <div class="categories-card">
                            {{-- categories placeholder --}}
                            <div class="cell type-generic">
                                <a href="#"> Pizza </a>
                            </div> 
                            <div class="cell type-generic">
                                <a href="#"> Panini </a>
                            </div> 
                        </div>
                    </div>
                    <div class="bottom-info">
                        {{-- <div class="stats">
                            <i class="fas fa-thumbs-up"></i>
                            <span>--</span>
                        </div> --}}
                        <div class="address-icon">
                            <a href="{{route('restaurantDetailsViewLink', $restaurant -> id)}}"><i class="fas fa-map-marker-alt"></i></a>
                            {{-- <div class="address-show">
                                {{$restaurant -> address}}
                            </div> --}}
                        </div>
                        
                        {{-- <a href="{{route('restaurantDetailsViewLink', $restaurant -> id)}}"><i class="fas fa-utensils"></i></a> --}}
                        <div class="delivery">
                            <img src="{{asset('/storage/assets/scooter.png')}}" alt="icona consegna">
                            <div class="delivery-checkout active">
                                &euro; 1,00
                            </div> 
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </main>
    
@endsection
