{{-- PAG PAGAMANETO --}}



@extends('layouts.pay-layout')
@section('content')

<main>
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">

                <form method="post" id="payment-form" action=" {{route ('checkoutOrder', $order -> id)}}">
                    @csrf
                    @method('POST')

                    <section>

                        <label for="amount">
                            <span class="input-label">TOTALE ORDINE</span>
                            <div class="input-wrapper amount-wrapper">
                                {{-- da implementare con il totale di ordine del cliente --}}
                                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{ $order -> total_price}}">
                            </div>
                        </label>

                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>

                    </section>

                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button class="btn btn-primary" type="submit"><span>PAGA IL TUO ORDINE</span></button>
                </form>

            </div>
        </div>
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
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
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
