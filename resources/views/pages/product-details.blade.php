@extends('layouts.main-layout')

@section('content')
    <main>
        <ul>
            <li>
                <h4>
                    Product '{{$product -> name}}' details
                </h4>
            </li>
            <li>
                Name: {{$product -> name}}
            </li>
            <li>
                Price: &euro; {{$product -> price}},00
            </li>
            <li>
                Ingredients: {{$product -> ingredients}}
            </li>
            <li>
                Description: {{$product -> description}}
            </li>
            <li>
                Imagine:
                <img src="{{ asset('storage/product-img/' . $product -> img) }}" alt="Imagine del car" width="50px">
            </li>
            <li>
                Visible:
                @if ($product -> visible)
                    <u>
                        yes
                    </u>
                @else
                    <u>
                        no
                    </u>
                @endif
            </li>
            
            @if (Auth::check())
                @if (Auth::user()->id == $product -> restaurant -> user -> id)
                    <li>
                        <a href="{{route('editProductViewLink', $product -> id)}}">Edit this product</a>
                    </li>
                    <li>
                        <a href="{{route('deleteProductLink', $product -> id)}}">Delete this product</a>
                    </li>
                @endif
            @endif
        </ul>
    </main>
@endsection
