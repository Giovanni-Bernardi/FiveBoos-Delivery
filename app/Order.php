<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'address',
        'telephone',
        'delivery_date',
        'delivery_time',
        'payment_status',
        'total_price',
    ];

    public function products(){
        return $this -> belongsToMany(Product::class);
    }
}
