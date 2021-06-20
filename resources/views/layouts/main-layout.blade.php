<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delivery</title>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Raleway:wght@200;400;600;700&display=swap" rel="stylesheet"> {{-- Freedoka One + Raleway --}}
    {{-- lottie --}}
    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.3.0/dist/lottie-player.js"></script>

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