<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Order;

class StatisticCharController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Funzione che ritorna i mesi degli ordini al grafico
    public function getOrderMonths(){
        $id = Auth::id();
        // dd($id);

        $orders_date = DB::table('orders')
                    -> join('order_product', 'orders.id', '=', 'order_product.order_id')
                    -> join('products', 'order_product.product_id', '=', 'products.id')
                    -> join('restaurants', 'restaurant_id', '=', 'restaurants.id')
                    // -> pluck('orders.delivery_date')
                    -> orderBy('orders.delivery_date', 'ASC')
                    -> select('orders.delivery_date')
                    // -> select('orders.firstname', 'products.name', 'restaurants.business_name', 'user_id', 'restaurants.id as res_id')
                    -> where([
                        ['restaurants.user_id', $id],
                        ['restaurants.id', 1]
                    ])
                    -> get();
        // dd($orders);

        $monthsList = [];

        foreach ($orders_date as $unformatted_date) {
            $date = new \DateTime($unformatted_date -> delivery_date);
            $monthNumber = $date -> format('m');
            $monthName = $date -> format('M');
            $monthsList [$monthNumber] =  $monthName;
        }
        return $monthsList;
    }
}
