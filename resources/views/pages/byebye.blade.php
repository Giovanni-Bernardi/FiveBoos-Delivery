{{-- PAG FINALE -> ESITO PAGAMENTO--}}
@extends('layouts.main-layout')
@section('content')

{{-- funzione che dopo 3 secondi ti porta alla pag 'indexViewLink' --}}
<head>
    {{-- <meta http-equiv="refresh" content="3; url={{ route('indexViewLink') }}" /> --}}
</head>

<main>
    <div id="tks_area">
        <h1 class="tks_text">
            Grazie per aver scelto FIVEBOO'S il tuo ordine partirà a breve..
        </h1>

        <div class="riders-img">
            <div id = "scooter">
               <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_0rxzjosz.json"  background="transparent"
                speed="1.5"  style="width: 400px; height: 400px;"  loop  autoplay></lottie-player>

            </div>
        </div>

        <div class="home_route">
            <a class="mx-2" href="{{ route('indexViewLink') }}"> <i class="fas fa-home"></i></a>
        </div>
    </div>
</main>

@endsection
