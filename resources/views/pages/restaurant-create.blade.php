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
            <form method="POST" action="{{ route('storeRestaurant') }}" enctype="multipart/form-data" id="new-restaurant">
                @csrf
                @method('POST')
                <ul>
                    <li>
                        <h2>Crea il tuo ristorante)</h2>
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
                            <textarea spellcheck="false" rows="8" name="description" class="text" required></textarea>
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
                                    <label for="categories[]">
                                        {{$category -> name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </li>

                </ul>
            </form>
            <div class="">
                <h1>Imagine</h1>
                <img src="" alt="">
            </div>
        </div>
        <div class="submit">
            <a class="button-back" href="#">Lista ristoranti</a>
            <button class="button-create" type="submit" class="btn btn-primary" form="new-restaurant">Crea Ristorante</button>
        </div>
    </div>
</main>
@endsection
