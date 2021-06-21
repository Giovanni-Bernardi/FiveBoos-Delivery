<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants', function (Blueprint $table){
            $table -> foreign('user_id', 'restaurant_user')
                    -> references('id')
                    -> on ('users');
        });
        Schema::table('products', function (Blueprint $table){
            $table -> foreign('restaurant_id', 'product_restaurant')
                    -> references('id')
                    -> on ('restaurants');
        });
        Schema::table('category_restaurant', function (Blueprint $table) {
            $table -> foreign('restaurant_id', 'restaurant-category')
                   -> references('id')
                   -> on('restaurants');
            $table -> foreign('category_id', 'category-restaurant')
                   -> references('id')
                   -> on('categories');
        });
        Schema::table('order_product', function (Blueprint $table) {
            $table -> foreign('order_id', 'order-product')
                   -> references('id')
                   -> on('orders');
            $table -> foreign('product_id', 'product-order')
                   -> references('id')
                   -> on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('restaurants', function (Blueprint $table){
        //     $table -> dropForeign('restaurant_user');
        // });
        // Schema::table('products', function (Blueprint $table){
        //     $table -> dropForeign('product_restaurant');
        // });
        // Schema::table('restaurant_type', function (Blueprint $table) {
        //     $table -> dropForeign('restaurant-category');
        //     $table -> dropForeign('category-restaurant');
        // });
        // Schema::table('order_product', function (Blueprint $table) {
        //     $table -> dropForeign('order-product');
        //     $table -> dropForeign('product-order');
        // });
    }
}
