@extends('layouts.main-layout')

@section('content')
    <main>

        @if (Auth::user()->id == $restaurant -> user -> id)
            <form  method="POST"
                    action="{{ route('updateRestaurantViewLink', $restaurant -> id) }}"
                    enctype="multipart/form-data">

                @method('POST')
                @csrf

                <ul>
                    <li>
                        <h4>
                            Restaurant '{{$restaurant -> business_name}}' Edit
                        </h4>
                    </li>
                    <li>
                        <label for="business_name">
                            Business name:
                        </label>
                        <input type="text" name="business_name" value="{{$restaurant -> business_name}}">
                    </li>
                    <li>
                        <label for="address">
                            Address:
                        </label>
                        <textarea name="address" cols="50" rows="2">{{$restaurant -> address}}</textarea>
                    </li>
                    <li>
                        <label for="piva">
                            P-IVA:
                        </label>
                        <input type="text" name="piva" value="{{$restaurant -> piva}}">
                    </li>
                    <li>
                        <label for="telephone">
                            Telephone:
                        </label>
                        <input type="text" name="telephone" value="{{$restaurant -> telephone}}">
                    </li>
                    <li>
                        <label for="description">
                            Description:
                        </label>
                        <textarea name="description" cols="50" rows="7">{{$restaurant -> description}}</textarea>
                    </li>
                    <li>
                        <label for="img">
                            IMG:
                            <img src="{{asset ('storage/restaurant-img/' . $restaurant -> img)}}" alt="" width="100px">
                        </label>
                        <input type="file" name="img">
                    </li>
                    <li>
                        Catrogies:
                        @foreach ($categories as $category)
                    </li>
                    <li>
                            <label for="categories[]">
                                {{$category -> name}}
                                {{$category -> id}}
                            </label>
                            <input type="checkbox" name="category_id[]" id="" value="{{$category -> id}}"
                                @foreach ($restaurant -> categories as $restaurantType)
                                    @if ($restaurantType -> id == $category -> id)
                                        checked
                                    @endif
                                @endforeach>
                    @endforeach
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <button type="submit">Save edit</button>
                    </li>
                </ul>
            </form>

        @else
            <h2>Non sei il proprietario di: {{$restaurant -> business_name}}</h2>
        @endif
    </main>

@endsection
