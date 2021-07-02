@extends('layouts.main-layout')

@include('components.header')
@include('components.preloader')

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
                    <a id="white-button" href="{{route('restaurantListLink', 'all')}}">ORDER NOW</a>
                    <span>or</span>
                    <a id="dotted-button" href="#">SELECT A FOOD ICON</a> <!-- no route -->
                </div>
            </div>
            <!-- types -->
            <ul>
                @foreach ($categories as $category)
                <li>
                    <div class="type popup-note scale" id="cat-{{$category -> name}}">
                        <a href="{{route('restaurantListLink', $category -> id)}}">
                            <img src="{{asset('/storage/assets/' . $category -> img)}}" alt="">
                        </a>
                        <a class="pop" href="#">{{$category -> name}}</a>
                    </div>
                </li>
                @endforeach
            </ul>

            <lottie-player id="lottie-player" src="https://assets8.lottiefiles.com/packages/lf20_kh7lwZ.json"
                background="transparent" speed="0.5" loop autoplay>
            </lottie-player>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

        </div> <!-- /background-jumbo -->
    </section> <!-- /landing-jumbo -->
</main>

@endsection