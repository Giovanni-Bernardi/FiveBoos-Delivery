<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table -> string('name', 64);
            $table -> string('ingredients', 1024);
            $table -> string('description', 1024);
            $table -> integer('price');
            $table -> boolean('visible') -> default(1);
            $table -> boolean('deleted') -> default(0);
            $table -> string('img') -> nullable();
            
            $table -> bigInteger('restaurant_id') -> unsigned() -> index();

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
        Schema::dropIfExists('products');
    }
}
