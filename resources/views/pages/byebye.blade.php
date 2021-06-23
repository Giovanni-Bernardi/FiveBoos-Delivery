{{-- PAG FINALE -> ESITO PAGAMENTO--}}
@extends('layouts.main-layout')

@section('content')

<head>
    <meta http-equiv="refresh" content="5; url={{ route('indexViewLink') }}" />
</head>

<main>
    <h1 class="prova1">
        Grazie per aver scelto FIVEBOO'S il tuo ordine partirà a breve
    </h1>

    {{-- <div class="movimento">

            <div id = "pot">
                <img src = "https://i.stack.imgur.com/qgNyF.png?s=328&g=1" width = "100px" height ="100px">
            </div>

    </div> --}}

    <div class="riders-img movimento">
        <div id = "scooter">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_iemp22mw.json"  background="transparent"  speed="3" loop  autoplay></lottie-player>

        </div>

    </div>

    <div class="home_route">
        <a class="mx-2" href="{{ route('indexViewLink') }}"> <i class="fas fa-home"></i></a>
    </div>



    
</main>

@endsection

