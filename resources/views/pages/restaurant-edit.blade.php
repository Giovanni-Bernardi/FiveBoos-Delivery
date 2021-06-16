@extends('layouts.main-layout')

@section('content')
    <main>
        <h2></h2>
        <form  method="POST"
            action="{{ route('updateRestaurantViewLink', $restaurant -> id) }}">
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
                    <hr>
                </li>
                <li>
                    <button type="submit">Save edit</button>
                </li>
            </ul>
        </form>
    </main>
@endsection