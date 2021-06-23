<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Braintree;
use App\Order;

class PaymentController extends Controller
{
    // pagamento ordine

    // private F da riusare quando necessario
    public function braintreeGateway()
    {
        $gateway = new Braintree\Gateway([
        'environment' => env('BT_ENVIRONMENT'),
        'merchantId' => env('BT_MERCHANT_ID'),
        'publicKey' => env('BT_PUBLIC_KEY'),
        'privateKey' => env('BT_PRIVATE_KEY')
        ]);

        return $gateway;
    }

    public function payOrder($id)
    {
        $gateway = $this -> braintreeGateway();

        $token = $gateway->ClientToken()->generate();

        $order = Order::findOrFail($id);

        // dd($gateway->ClientToken()->generate());

        return view('pages.pay', compact('order', 'gateway', 'token'));
    }

    public function checkoutOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        // dd($order);
        $gateway = $this -> braintreeGateway();

        $amount = $request -> amount;
        $nonce = $request -> payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            // se cliente è autenticato si possono passare i dati in questo modo dopo aver tirato dentro illuminate Auth
            // 'customer' => [
            // 'firstName' => Auth::user() -> name,
            // 'email' => Auth::user() -> email,
            // ],
            'customer' => [
                'firstName' => 'Mario',
                'lastName' => 'Rossi',
                'email' => 'mail@gmail.com'
            ],
            'options' => ['submitForSettlement' => true]
        ]);
        // dd($result);

        // situazione di successo
        if ($result->success) {
            $transaction = $result->transaction;
            $order -> payment_status = 1;
            $order -> save();

            return redirect() -> route('byebyeOrder') -> with ('message', 'pagamento andato a buon fine. ID pagamento: ' .
            $transaction -> id);


            // situazione di errore
        }
        else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return redirect() -> route('byebyeOrder') -> withErrors('errore di pagamento: ' . $result -> message);
        }
    }

    public function byebyeOrder()
    {
        return view('pages.byebye');
    }

}
