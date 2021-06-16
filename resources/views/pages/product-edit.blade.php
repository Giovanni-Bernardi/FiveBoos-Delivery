@extends('layouts.main-layout')

@section('content')
    <main>
        <h2></h2>
        <form action="" method="POST">
            @method('POST')
            @csrf

            <ul>
                <li>
                    <h4>
                        Restaurant '{{$product -> name}}' Edit
                    </h4>
                </li>
                <li>
                    <label for="name">
                        Product name: 
                    </label>
                    <input type="text" name="name" value="{{$product -> name}}">
                </li>
                <li>
                    <label for="name">
                        Ingredients: 
                    </label>
                    <textarea name="ingredients" cols="40" rows="5">{{$product -> ingredients}}</textarea>
                </li>
                <li>
                    <label for="description">
                        Description: 
                    </label>
                    <textarea name="description" cols="40" rows="5">{{$product -> description}}</textarea>
                </li>
                <li>
                    <label for="price">
                        Price: 
                    </label>
                    <input type="text" name="price" value="{{$product -> price}}">
                </li>
                <li>
                    <label for="1">
                        Visible:
                    </label>
                    <input type="radio" name="visible" value="1">
                    <label for="0">
                        Non Visible:
                    </label>
                    <input type="radio" name="visible" value="0">
                    {{-- <input type="checkbox" name="visible" value="1"> --}}
                </li>
                <li>
                    <button type="submit">Save edit</button>
                </li>
            </ul>
        </form>
    </main>
@endsection