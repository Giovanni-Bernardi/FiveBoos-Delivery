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

    {{-- JS App --}}
    <script src="{{asset('/js/app.js')}}"></script>

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body>
    @include('components.header')
    @yield('content')
    @include('components.footer')
</body>
</html>