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
        'delivery_date',
        'total_price',
        'telephone'
    ];

    public function products(){
        return $this -> belongsToMany(Product::class);
    }
}
