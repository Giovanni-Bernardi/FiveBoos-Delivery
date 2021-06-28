@extends('layouts.main-layout')

@include('components.header')

@section('content')
<main>
    {{-- Sezione landing page --}}
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
                    <a id="white-button" href="{{route('restaurantListLink')}}">ORDER NOW</a>
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
</main>

@endsection
