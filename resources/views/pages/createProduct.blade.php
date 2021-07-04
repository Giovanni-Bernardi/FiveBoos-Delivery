@extends('layouts.main-layout')

@section('content')
<main>
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div>
      <form method="POST" action="{{ route('storeProduct') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <h1>Aggiungi nuovo Piatto:</h1>
        <ul>

          <li>
            <h2>Nome del Piatto</h2>
            <div>
              <input type="text" name="name" placeholder="Name" required>
            </div>
          </li>

          <li>
            <h2>Ingredienti</h2>
            <div>
              <input type="text" name="ingredients" placeholder="Ingredients" required>
            </div>
          </li>

          <li>
            <h2>Descrizione</h2>
            <div>
              <input type="text" name="description" placeholder="Description" required>
            </div>
          </li>

          <li>
            <h2>Prezzo</h2>
            <div>
              <input type="number" name="price" placeholder="Price" required>
            </div>
          </li>

          <li>
            <h2>visible</h2>
            <div>
              <input type="radio" name="visible" value="0">
              <input type="radio" name="visible" value="1">
            </div>
          </li>

          <li>
            <h2>Ristorante</h2>
            <div>
                <select name="restaurant_id">
                    {{-- <option selected disabled>Brand</option> --}}
                    @foreach ($restaurants as $restaurant)
                        <option value="{{ $restaurant -> id }}">
                            {{$restaurant -> business_name}}
                        </option>
                    @endforeach
                </select>
            </div>
          </li>

          <li>
            <h2>Imagine del Piatto</h2>
            <div>
              <input type="file" name="img">
            </div>
          </li>

        </ul>

        <div class="button-center">
          <button type="submit" class="home">Aggiungi Piatto</button>
          <a class="home" href="{{route('createProduct')}}">Lista dei Piatti</a>
          {{-- <a class="home" href="{{route('restaurantDetailsViewLink')}}">Lista dei Piatti</a> --}}
        </div>

      </form>
    </div>
</main>
@endsection
