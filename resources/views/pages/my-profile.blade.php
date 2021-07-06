@extends('layouts.main-layout')

@include('components.search-header')

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
                @if (count($restaurants) > 0)
                    @foreach ($restaurants as $restaurant)
                        @if (!$restaurant -> deleted)
                            <li class="crd  @if(!$restaurant -> visible) hidden-crd @endif" >
                                <ul>
                                    <li class="background-image">
                                        <img src="{{asset('/storage/restaurant-img/' . $restaurant -> img)}}" alt="copertina ristorante">
                                        <span>{{$restaurant -> business_name}}</span>
                                    </li>
            
                                    <li id="restaurant-address">
                                        <p>
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{substr($restaurant -> address, 0, 30)}}@if (strlen($restaurant -> address) > 30)...@endif
                                        </p>
                                    </li>
            
                                    <li class="btn-edit-del">
                                        <a class="edit-button" href={{ route('restaurantDetailsProfileLink', Crypt::encrypt($restaurant -> id))}}><i class="fas fa-edit"></i></a>

                                        @if ($restaurant -> visible == 0)
                                            <a class="hide-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}>
                                                <i class="fas fa-eye-slash"></i>
                                            </a>
                                        @else
                                            <a class="hide-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}>
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endif

                                        <a href="{{route('realDeleteRestaurantLink', $restaurant -> id)}}" class="delete-res-button" 
                                        {{--  --}}>
                                            <i class="fas fa-trash-alt"></i>
                                            {{-- <div class="alert">
                                                <p>
                                                    Vuoi eliminare '<strong>{{$restaurant -> business_name}}'</strong>?
                                                    <br>
        
                                                    <a href="{{route('realDeleteRestaurantLink', $restaurant -> id)}}">Ok</a>
                                                    <span class="undoIt">Annulla</span>
                                                </p>
                                            </div> --}}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        @endif
                    @endforeach
                @else
                    <p>Non possiedi ancora nessun ristorante. Creane uno nuovo!</p>
                @endif
            </ul>    
        </section>
    @else
        <h1>Devi accedere per vedere questa pagina!</h1>
    @endif
</main>

<script>
    // let deleteBtns = document.getElementsByClassName("delete-res-button");
    // let undoBtns = document.getElementsByClassName("undoIt");


    // for (let i = 0; i < deleteBtns.length; i++) {
    //     const element = deleteBtns[i];
    //     console.log(element);
    //     element.addEventListener('click', function() {
    //         element.classList.add('active');
    //         // console.log(element, undoBtns);
    //     });
        
    // }

    // for (let i = 0; i < undoBtns.length; i++) {
    //     console.log(undoBtns[i]);
    //     undoBtns[i].addEventListener('click', function(){
    //         for (let i = 0; i < deleteBtns.length; i++) {
    //             const element2 = deleteBtns[i];
    //             element2.classList.remove('active');
    //         }
    //     });
    //     console.log(undoBtns[i]);
    // }

    // for (let i = 0; i < deleteBtns.length; i++) {
    //     console.log(undoBtns, i);
    //     const element2 = array[i];
    //     // element2.addEventListener('click', function() {
    //         // console.log(element, 'escii');
    //     //     for (let j = 0; j < deleteBtns.lengt; j++) {
    //     //         const element2 = deleteBtns[j];
    //     //         console.log();
    //     //         // element2.classList.remove('active');    
    //     //     }
    //     //     console.log(element, undoBtns);
    //     // });
    // }

</script>
@endsection
