<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delivery</title>
    {{-- Libreria Stats --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    {{-- SASS --}}
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Raleway:wght@200;400;600;700&display=swap" rel="stylesheet"> {{-- Freedoka One + Raleway --}}
    {{-- lottie --}}
    {{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@0.3.0/dist/lottie-player.js"></script> --}}
    {{-- JS/VUE --}}
    {{-- <script src="{{ asset('js/stats.js') }}"></script> --}}
    <script src="{{ asset('js/header-animation.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @include('components.search-header')
    @include('components.notifications')

    @yield('content')

    @include('components.footer')
</body>
</html>
