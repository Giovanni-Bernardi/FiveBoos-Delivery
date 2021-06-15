<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'ingredients',
        'description',
        'price',
        'visible',
        'img'
    ];

    public function restaurant(){
        return $this -> belongsTo(Restaurant::class);
    }

    public function orders(){
        return $this -> belongsToMany(Order::class);
    }
}
