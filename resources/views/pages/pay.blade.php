{{-- PAG PAGAMANETO --}}

@extends('layouts.pay-layout')
@section('content')

<main>

    <div id="pay_area">

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_EchaWV.json" background="#00CCBC" speed="0.5" style="width: 100%; height: 100%; position: fixed" loop autoplay></lottie-player>

        <form method="post" id="payment-form" action="{{route ('checkoutOrder', $order -> id)}}">
            @csrf
            @method('POST')
            <div id="box_list" class="animate__animated animate__backInLeft animate__slow">

                <h2>firstname</h2>
                <div>
                    <input type="text" name="firstname" placeholder="firstname" required>
                </div>

                <h2>lastname</h2>
                <div>
                    <input type="text" name="lastname" placeholder="lastname" required>
                </div>

                <h2>email</h2>
                <div>
                    <input type="text" name="email" placeholder="email" required>
                </div>

                <h2>Telefono</h2>
                <div>
                    <input type="text" name="telephone" placeholder="telephone" required>
                </div>


                <h2>address</h2>
                <div>
                    <input type="text" name="address" placeholder="address" required>
                </div>

                <h2>delivery_date</h2>
                <div>
                    <input type="date" name="delivery_date" required>
                    <input type="time" name="delivery_time" required>
                </div>

                <input type="hidden" name="total_price" required>
            </div>
            <div id="box_pay" class="animate__animated animate__swing animate__delay-3s">
                <section>
                    <label for="amount">
                        <h2 class="input-label">Totale Ordine:</h2>

                        <h3> {{$order -> total_price}} <i class="fas fa-euro-sign"></i> </h3>

                        <div class="input-wrapper amount-wrapper">
                            {{-- campo input messo in 'hidden' per passare il prezzo a Breintree serve cmq lasciarlo --}}
                            <input id="amount" name="amount" type="hidden" min="1" placeholder="Amount" value="{{ $order -> total_price}}" readonly>
                        </div>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="btn btn-primary" type="submit" form="update-order" form="payment-form"><span>PAGA IL TUO ORDINE</span></button>
            </div>
        </form>
    </div>

</main>

<script src="https://js.braintreegateway.com/web/dropin/1.30.0/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    // var client_token = "<?php echo($gateway->ClientToken()->generate()); ?>";
    var client_token = "{{ $token }}";

    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
        //   paypal: {
        //     flow: 'vault'
        //   }
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
