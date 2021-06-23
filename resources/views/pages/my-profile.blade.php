@extends('layouts.main-layout')

@include('components.header')

@section ('content')
  <main>
    <section class="side-padding" id="restaurant-container">
      <div id="welcome-back">
        <span>bentornato {{$restaurant -> business_name}}!</span> 
      </div>
      <div id="create-row">
        <div id="left-create">
          <h1>I tuoi ristoranti</h1>
        </div>
        <div id="right-create">
          <a id="create-button" href="{{ route('editRestaurantViewLink', $restaurant -> id)}}">crea ristorante<i class="fas fa-plus-circle"></i></a>
      </div>
        
      </div>
        {{-- le immagini andranno rese dinamiche --}}
        <div id="restaurant-cards">
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li><p>{{$restaurant -> description}}</p></li>
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </ul>
          </div>
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li><p>{{$restaurant -> description}}</p></li>
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </ul>
          </div>
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li><p>{{$restaurant -> description}}</p></li>
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </ul>
          </div>
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li><p>{{$restaurant -> description}}</p></li>
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </ul>
          </div>
        </div>
    </section>
    
  </main>
@endsection