<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewOrderNotify;

use Braintree;
use App\Restaurant;
use App\Product;
use App\Category;
use App\Order;
use App\User;

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

    public function payOrder(Request $request)
    {
        if(!session() -> has('products')){
            return redirect() -> route('indexViewLink');
        }

        
        $total_price = session('total_price')[0];
        $sessionProducts = session('products');
        
        $gateway = $this -> braintreeGateway();
        
        $token = $gateway->ClientToken()->generate();
        
        $productsList = [];
        // Creo un array con i prod. già ordinati
        foreach ($sessionProducts as $product_id) {
            $query = Product::findOrFail($product_id);
            $productsList [] = $query;
        }
        
        // Nuovo array con nome e quanità per riepilogo carrello
        $products = [];
        for ($i=0; $i < count($productsList) ; $i++) { 
            if($i == 0){
                $products[$i] ['id'] = $productsList[$i] -> id;
                $products[$i] ['name'] = $productsList[$i] -> name;
                $products[$i] ['price'] = $productsList[$i] -> price;
                $products[$i] ['count'] = 1;
                
            }
            else if($productsList[$i] -> id == $products[count($products) - 1]['id']){
                $products[count($products) - 1]['count'] ++;
            }
            else{
                $products[count($products)] ['id'] = $productsList[$i] -> id;
                $products[count($products) - 1] ['name'] = $productsList[$i] -> name;
                $products[count($products) - 1] ['price'] = $productsList[$i] -> price;
                $products[count($products) - 1] ['count'] = 1;
            }
        }
        
        if (Auth::check()) {
            $user = User::findOrFail(Auth::id());
            return view('pages.pay', compact('gateway', 'token', 'total_price', 'products', 'user'));
        }else{
            return view('pages.pay', compact('gateway', 'token', 'total_price', 'products'));
        }
    }

    public function checkoutOrder(Request $request) {
        
        $validate = $request -> validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'telephone' => 'required|string',
            'delivery_time' => 'required|string',
        ]);
        
        date_default_timezone_set('Europe/Rome');
        $time = strtotime($request -> delivery_time);;
        $minimumTime = strtotime('+ 25 minutes');

        if ($time < $minimumTime) {
            return redirect() -> route('payOrder') -> with('msg', 'Pagamento riufiutato, riprovare più tardi.');
        }
        
        $order = Order::make($validate);

        $order -> delivery_date = date('Y-m-d');
        $order -> total_price = session('total_price')[0];

        $gateway = $this -> braintreeGateway();

        $products = session('products');
        sort($products);

        // $amount = $request -> amount;
        // Amount adesso viene passato dalla session (input non necessario)
        $partialAmount = session('total_price')[0]; 
        $amount = number_format($partialAmount = floatval($partialAmount / 100), 2);
        // number_format($prezzo = (floatval($product['price'] / 100 )), 2)
        $nonce = $request -> payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            // se cliente è autenticato si possono passare i dati in questo modo dopo aver tirato dentro illuminate Auth
            // 'customer' => [
            // 'firstName' => Auth::user() -> name,
            // 'email' => Auth::user() -> email,
            // ],
            // 'customer' => [
            //     'firstName' => 'Mario',
            //     'lastName' => 'Rossi',
            //     'email' => 'mail@gmail.com'
            // ],
            'customer' => [
                    'firstName' => $order -> firstname,
                    'lastName' => $order -> lastname,
                    'email' => $order -> email
            ],
            'options' => ['submitForSettlement' => true]
        ]);

        // Situazione di successo
        if ($result->success) {
            $transaction = $result->transaction;
            $order -> payment_status = 1;
            $order -> save();
            $order -> products() -> attach($products);
            $order -> save();

            $mail = new NewOrderNotify($order);
            Mail::to($order -> email) -> send($mail);

            return redirect() -> route('byebyeOrder') -> with ('message', 'Pagamento effettuato con successo. ID pagamento: ' .
            $transaction -> id);
        }
        // Situazione di errore
        else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return redirect() -> route('byebyeOrder') -> withErrors('Errore nel pagamento: ' . $result -> message);
        }
        
        // Pulizia session
        session()->forget(['products', 'total_price']);
    }

    public function byebyeOrder(){

        return view('pages.byebye');
    }

}
