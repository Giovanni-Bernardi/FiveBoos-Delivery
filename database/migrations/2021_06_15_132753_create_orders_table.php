<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table -> string('firstname', 128);
            $table -> string('lastname', 128);
            $table -> string('email', 128);
            $table -> string('address');
            $table -> string('telephone', 32);
            $table -> date('delivery_date');
            $table -> time('delivery_time');
            $table -> boolean('payment_status') -> default(0);
            $table -> integer('total_price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
