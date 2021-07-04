<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table -> string('business_name', 128);
            $table -> string('piva', 64);
            $table -> string('address');
            $table -> string('description', 1024);
            $table -> string('telephone', 32);
            $table -> string('img') -> nullable();
            $table -> string('img_background') -> nullable();
            $table -> boolean('visible') -> default(1);
            $table -> boolean('deleted') -> default(0);

            $table -> bigInteger('user_id') -> unsigned() -> index();

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
        Schema::dropIfExists('restaurants');
    }
}
