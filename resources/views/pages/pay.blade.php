{{-- PAG PAGAMANETO --}}

@extends('layouts.pay-layout')
@section('content')

<main class="pay-order">

    <form method="post" id="payment-form" action="{{route ('checkoutOrder')}}">

        @csrf
        @method('POST')

        <div id="box-left">
            <div class="container">
                <h3>Check-out</h3>
                <h2>
                    Totale: {{number_format($prezzo = (floatval($total_price / 100 )), 2)}} &euro;
                </h2>

                <h4 id="title-recap">Riepilogo ordine:</h4>

                <div class="container-order">
                    <div>
                        <ul class="recap-order">
                            <li>Prodotto</li>
                            <li>Q.tà</li>
                            <li>Prezzo</li>
                        </ul>
                    </div>

                    <div>
                        @foreach ($products as $product)
                            <ul class="plates">
                                <li>{{$product['name']}}</li>
                                <li>{{$product['count']}}</li>
                                <li>{{number_format($prezzo = (floatval($product['price'] / 100 )), 2)}}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="powered">
                <h4>Powered by <strong>Team5</strong></h4>
            </div>

        </div>

        <div id="box_pay">
            <div class="box-form">

                <section>
                    <label for="amount">
                        <h2>Informazioni</h2>
                        <ul>
                            <li>
                                <label for="firstname">Nome</label>
                                <input type="text" name="firstname" required>
                            </li>
                            <li>
                                <label for="lastname">Cognome</label>
                                <input type="text" name="lastname" required>
                            </li>
                            <li>
                                <label for="email">Email</label>
                                <input type="text" name="email" required>
                            </li>
                            <li>
                                <label for="telephone">Telefono</label>
                                <input type="text" name="telephone" required>
                            </li>
                            <li>
                                <label for="address">Indirizzo</label>
                                <input type="text" name="address" required>
                            </li>
                            <li>
                                <label>Data di consegna</label>
                                <div class="box-date-format">
                                    <div class="box-time">
                                        <p>{{date("j-n-Y")}}</p>
                                    </div>
                                    <div class="box-date">
                                        @php
                                            date_default_timezone_set("Europe/Rome");
                                            $now = date("H:i");
                                            $firstAvailable = date('H:i', strtotime('+30 minutes', strtotime($now)));
                                        @endphp
                                        <input class="time" type="time" name="delivery_time" min="{{$firstAvailable}}" value= "{{$firstAvailable}}" required>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="btn btn-primary" type="submit" form="payment-form">Termina e paga</button>

            </div>
        </div>

    </form>
</main>

<script src="https://js.braintreegateway.com/web/dropin/1.30.0/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    // var client_token = "<?php echo($gateway->ClientToken()->generate()); ?>";
    var client_token = "{{ $token }}";

    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
    }, function(createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            instance.requestPaymentMethod(function(err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }

                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
        });
    });
</script>

@endsection
