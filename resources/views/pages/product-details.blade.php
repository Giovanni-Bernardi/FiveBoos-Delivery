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
            <li>
                <a href="{{route('editProductViewLink', $product -> id)}}">Edit this product</a>
            </li>
            <li>
                <a href="{{route('deleteProductLink', $product -> id)}}">Delete this product</a>
            </li>
        </ul>
    </main>
@endsection