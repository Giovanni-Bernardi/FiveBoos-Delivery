@extends('layouts.main-layout')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main class="create-restaurant">
    <div class="container">
        <div class="separation-content">
            <div class="logo-image">
                <img id="logo-img" src="{{asset('/storage/assets/site-logo/create.svg')}}" alt="logo">
            </div>

            <form method="POST" action="{{ route('storeRestaurant') }}" enctype="multipart/form-data" id="new-restaurant">
                @csrf
                @method('POST')
                <ul>
                    <li>
                        <h2>Crea il tuo ristorante</h2>
                    </li>
                    <li>
                        <label>Nome del ristorante</label>
                        <div class="">
                            <input type="text" class="text" name="business_name" required>
                        </div>
                    </li>
                    <li>
                        <label>Partita IVA</label>
                        <div class="">
                            <input type="number" class="text" name="piva" required>
                        </div>
                    </li>
                    <li>
                        <label>Indirizzo</label>
                        <div class="">
                            <input type="text" class="text" name="address" required>
                        </div>
                    </li>
                    <li>
                        <label>Descrizione</label>
                        <div class="">
                            <textarea spellcheck="false" rows="4" name="description" class="text" required></textarea>
                        </div>
                    </li>
                    <li>
                        <label>Telefono</label>
                        <div class="">
                            <input type="text" class="text" name="telephone" required>
                        </div>
                    </li>
                    <li>
                        <label>Imagine del ristorante</label>
                        <div class="">
                            <input type="file" class="text" name="img">
                        </div>
                    </li>
                    <li>
                        <label>Categorie</label>
                        <div class="container-categories">
                            @foreach ($categories as $category)
                                <div class="category">
                                    <input id="cat-{{$category -> id}}" type="checkbox" name="category_id[]" value="{{$category -> id}}">
                                    <label for="cat-{{$category -> id}}" class="circle"></label>
                                    <label class="name-category" for="cat-{{$category -> id}}">
                                        {{$category -> name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
                <div class="submit">
                    <a class="button-back" href='{{ route('restaurantProfileViewLink')}}'>Lista ristoranti</a>
                    <button class="button-create" type="submit" class="btn btn-primary" form="new-restaurant">Crea Ristorante</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
