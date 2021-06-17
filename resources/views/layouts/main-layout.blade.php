<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delivery</title>
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body>
    @include('components.header')
    <div class="container-fixed">
        @yield('content')
    </div>  
    @include('components.footer')
</body>
</html>