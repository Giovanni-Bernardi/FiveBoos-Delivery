{{-- PAG PAGAMANETO --}}

@extends('layouts.pay-layout')
@section('content')

<main class="pay-order">

    <form method="post" id="payment-form" action="{{route ('checkoutOrder')}}">
    {{-- <form method="post" id="payment-form" action="{{route ('checkoutOrder', $order -> id)}}"> --}}
        @csrf
        @method('POST')
        <div id="box-left">
            <div class="container">
                <h3>Fiveboo's Chackout</h3>
                <h2>
                    <i class="fas fa-euro-sign"></i> {{$total_price}}
                </h2>
                <ul>
                    <li>Riepilogo ordine:</li>
                    @foreach ($products as $product)
                        <li>
                            {{$product['name']}} {{$product['price']}},00 &euro; - Q.tà {{$product['count']}}
                            {{-- {{($product['price'] * $product['count'])}},00 &euro; --}}
                        </li>
                    @endforeach
                </ul>
                <img src="{{asset('/storage/product-img/1623846898948.jpg')}}" alt="">
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
                                    <div class="box-date">
                                        <input class="time" type="time" name="delivery_time" required>
                                        <i class="fas fa-clock time-icon"></i>
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
