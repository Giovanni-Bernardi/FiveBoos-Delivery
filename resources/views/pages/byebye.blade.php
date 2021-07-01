{{-- PAG FINALE -> ESITO PAGAMENTO--}}
@extends('layouts.main-layout')
@section('content')

{{-- funzione che dopo 3 secondi ti porta alla pag 'indexViewLink' --}}
<head>
    <meta http-equiv="refresh" content="4; url={{ route('indexViewLink') }}" />
</head>

<main id="bye-container">
    @if (session('message'))
        <div id="container-result">
            <div>
                <div id="container-text">
                    <h2>Pagamento effettuato con sucesso!</h2>
                    <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_v2PAPH.json"  background="transparent"  speed="0.5"  style="width: 150px; height: 150px;" autoplay></lottie-player>
                </div>
                <h2>Grazie per aver scelto 5 Boo's Delivery!</h2>
                <h2>Il tuo ordine sta arrivando!</h2>
                <div id="scooter">
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_0rxzjosz.json"  background="transparent" speed="1"  style="width: 300px; height: 300px;" autoplay></lottie-player>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div id="container-result">
            <div>
                <div id="container-text">
                    <h2>Scusate ma e successo un errore!</h2>
                    <lottie-player src="https://assets6.lottiefiles.com/private_files/lf30_chkimb7d.json"  background="transparent"  speed="0.8"  style="width: 150px; height: 150px;" autoplay></lottie-player>
                </div>
            </div>
        </div>
    @endif
</main>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection
