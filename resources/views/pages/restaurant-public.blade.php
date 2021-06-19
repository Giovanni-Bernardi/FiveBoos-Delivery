@extends('layouts.main-layout')

@section('content')
    <main>
        <h2>Delivery</h2>
        <ul>
            <li>
                <h4>
                    Restaurants List:
                </h4>
            </li>
            @foreach ($restaurants as $restaurant)
                <li>
                    {{$restaurant -> business_name}}
                    <a href="{{route('restaurantDetailsPublicLink', $restaurant -> id)}}">details</a>
                </li>
            @endforeach
        </ul>
    </main>
@endsection
