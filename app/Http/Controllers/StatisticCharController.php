<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Order;
use App\Restaurant;

class StatisticCharController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Funzione default che torna gli ordini ad un determinato ristorante
    public function getOrdersByRestuarant($restaurantId, $selectedYear){
        $id = Auth::id();

        $orders_date = DB::table('orders')
                    -> join('order_product', 'orders.id', '=', 'order_product.order_id')
                    -> join('products', 'order_product.product_id', '=', 'products.id')
                    -> join('restaurants', 'restaurant_id', '=', 'restaurants.id')
                    -> select('orders.delivery_date', 'restaurants.id as res_id')
                    // -> select('orders.firstname', 'products.name', 'restaurants.business_name', 'user_id', 'restaurants.id as res_id')
                    -> orderBy('orders.delivery_date', 'ASC')
                    -> where([
                        ['restaurants.user_id', $id],
                        ['restaurants.id', $restaurantId], // !Inserire id ristorante selezionato
                        ])
                    -> whereYear('orders.delivery_date', $selectedYear)
                    -> get();
        return $orders_date;
    }

    // Funzione che ritorna i mesi degli ordini al grafico (ASC, no doppioni)
    public function getOrdersMonths($restaurantId, $selectedYear = 0){
        $monthsList = [];
        $countsPerMont = [];

        if(!$selectedYear){
            $selectedYear = date('Y');
        }

        $orders_date = $this -> getOrdersByRestuarant($restaurantId, $selectedYear);

        //Ciclo che crea array di mesi ordinato e senza doppioni
        foreach ($orders_date as $unformatted_date) {
            $date = new \DateTime($unformatted_date -> delivery_date);
            $monthNumber = $date -> format('m');
            $monthName = $date -> format('M');
            $monthsList [$monthNumber] =  $monthName; // Sovrascrive i mesi uguali (Key => Value | MonthName => MonthNumber)
        }

        foreach ($monthsList as $monthNumber => $month) {
            $countsPerMont [] = $this -> getOrdersCount($monthNumber, $restaurantId, $selectedYear);   
        }

        // Trasformo obj monthsNameList da Obj in array per encode migliore
        $monthsListNoObj = [];
        foreach ($monthsList as $key => $value) {
            $monthsListNoObj [] = $value;
        }

        return json_encode([$monthsListNoObj ,$countsPerMont]);
    }

    // Funzione che ritorna il count degil ordini per mese
    public function getOrdersCount($monthNumber, $restaurantId, $selectedYear){
        // $month = '08';
        $id = Auth::id();

        $orderPerMonth = DB::table('orders')
                        -> join('order_product', 'orders.id', '=', 'order_product.order_id')
                        -> join('products', 'order_product.product_id', '=', 'products.id')
                        -> where ('products.restaurant_id', $restaurantId)
                        -> whereMonth('orders.delivery_date', $monthNumber)
                        -> whereYear('orders.delivery_date', $selectedYear)
                        -> get()
                        -> count();
        // dd($orderPerMonth);
        return $orderPerMonth;
    }
}
