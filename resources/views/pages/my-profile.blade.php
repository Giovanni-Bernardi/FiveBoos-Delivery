@extends('layouts.main-layout')

@include('components.header')

@section ('content')
  <main>
    <section class="side-padding" id="restaurant-container">
      <div id="welcome-back">
        <span>Bentornato {{$restaurant -> business_name}}!</span> 
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
          {{-- @foreach ($restaurants as $restaurant)
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li id="restaurant-address"><i class="fas fa-map-marker-alt"></i><p>{{$restaurant -> address}}</p></li>
            </ul>
            <div class="btn-edit-del">
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </div>
          </div>
          @endforeach --}}
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li id="restaurant-address"><i class="fas fa-map-marker-alt"></i><p>{{$restaurant -> address}}</p></li>
            </ul>
            <div class="btn-edit-del">
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </div>
          </div>
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li id="restaurant-address"><i class="fas fa-map-marker-alt"></i><p>{{$restaurant -> address}}</p></li>
            </ul>
            <div class="btn-edit-del">
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </div>
          </div>
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li id="restaurant-address"><i class="fas fa-map-marker-alt"></i><p>{{$restaurant -> address}}</p></li>
            </ul>
            <div class="btn-edit-del">
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </div>
          </div>
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li id="restaurant-address"><i class="fas fa-map-marker-alt"></i><p>{{$restaurant -> address}}</p></li>
            </ul>
            <div class="btn-edit-del">
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </div>
          </div>
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li id="restaurant-address"><i class="fas fa-map-marker-alt"></i><p>{{$restaurant -> address}}</p></li>
            </ul>
            <div class="btn-edit-del">
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </div>
          </div>
          <div class="crd">
            <ul>
              <li><img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante"></li>
              <li><span>{{$restaurant -> business_name}}</span></li>
              <li id="restaurant-address"><i class="fas fa-map-marker-alt"></i><p>{{$restaurant -> address}}</p></li>
            </ul>
            <div class="btn-edit-del">
              <a id="edit-button" href={{ route('editRestaurantViewLink', $restaurant -> id)}}><i class="fas fa-edit"></i></a>
              <a id="delete-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-trash-alt"></i></a>
            </div>
          </div>
        </div>
    </section>
  </main>
@endsection