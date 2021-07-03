@extends('layouts.main-layout')

@include('components.header')

@section ('content')
<main id="profile">
    @if (Auth::check())
        
        <h1>I tuoi ristoranti</h1>
        <div class="create-restaurant">
            <div>
                <a id="create-button" href="{{ route('createRestaurant')}}">Crea Ristorante<i class="fas fa-plus-circle"></i></a>
            </div>
        </div>

        <section class="restaurant-container">
            <ul id="restaurant-cards">
                @foreach ($restaurants as $restaurant)
                    <li class="crd  @if(!$restaurant -> visible) hidden-crd @endif" >
                        <ul>
                            <li class="background-image">
                                <img src="{{asset('/storage/assets/pizza-try.jpg')}}" alt="copertina ristorante">
                                <span>{{$restaurant -> business_name}}</span>
                            </li>
    
                            <li id="restaurant-address">
                                <p>
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{substr($restaurant -> address, 0, 30)}}@if (strlen($restaurant -> address) > 30)...@endif
                                </p>
                            </li>
    
                            <li class="btn-edit-del">
                                <a id="edit-button" href={{ route('restaurantDetailsProfileLink', Crypt::encrypt($restaurant -> id))}}><i class="fas fa-edit"></i></a>
                                @if ($restaurant -> visible == 0)
                                    <a class="hide-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-eye-slash"></i></a>
                                @endif
                                @if ($restaurant -> visible == 1)
                                    <a class="hide-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-eye"></i></a>
                                @endif
                            </li>
                        </ul>
                    </li>
                @endforeach
            </ul>    
        </section>
    @else
        <h1>Devi accedere per vedere questa pagina!</h1>
    @endif
</main>
@endsection
