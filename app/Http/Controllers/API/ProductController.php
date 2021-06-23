<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\Restaurant;

class ProductController extends Controller
{

    public function index($id)
    {
        $products = DB::table("products") -> where("restaurant_id", $id) -> get();

        return response()->json($products);
    }
}
