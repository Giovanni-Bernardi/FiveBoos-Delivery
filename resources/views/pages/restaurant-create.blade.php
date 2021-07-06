@extends('layouts.main-layout')

@include('components.search-header')

@section('content')
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

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
                        <label>Nome</label>
                        <div class="">
                            <input type="text" placeholder="Nome del tuo ristorante" maxlength="50" class="text" name="business_name" required>
                        </div>
                    </li>
                    <li>
                        <label>Partita IVA</label>
                        <div class="">
                            <input type="text" placeholder="IT12345678900" maxlength="13" class="text" name="piva" required>
                        </div>
                    </li>
                    <li>
                        <label>Indirizzo</label>
                        <div class="">
                            <input type="text" maxlength="128" placeholder="Inserisci l'indirizzo" class="text" name="address" required>
                        </div>
                    </li>
                    <li>
                        <label>Descrizione</label>
                        <div class="">
                            <textarea spellcheck="false" rows="4" name="description" class="text" placeholder="Inserisci una descrizione" required></textarea>
                        </div>
                    </li>
                    <li>
                        <label>Telefono</label>
                        <div class="">
                            <input type="text" class="text" name="telephone" maxlength="30" required placeholder="+39 0308000000">
                        </div>
                    </li>
                    <li>
                        <label>Immagine principale</label>
                        <div class="">
                            <input type="file" class="text" name="img">
                        </div>
                    </li>
                    <li>
                        <label>Immagine banner</label>
                        <div class="">
                            <input type="file" class="text" name="img_background">
                        </div>
                    </li>
                    <li>
                        <label>Categorie (min. 1, max. 3)</label>
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
                    <a class="button-back" href='{{ route('restaurantProfileViewLink')}}'>Indietro</a>
                    <button class="button-create" type="submit" class="btn btn-primary" form="new-restaurant">Crea Ristorante</button>
                </div>
            </form>
        </div>
    </div>
</main>

{{-- <script>
    $('input[type=checkbox]').on('change', function (e) {
        if ($('input[type=checkbox]:checked').length > 3) {
        $(this).prop('checked', false);
        // alert("puoi selezionare massimo 3 Categorie");
        }
    });
</script> --}}
@endsection
