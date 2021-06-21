<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'business_name',
        'piva',
        'address',
        'description',
        'telephone',
        'img'
    ];

    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function categories(){
        return $this -> belongsToMany(Category::class);
    }

    public function products(){
        return $this -> hasMany(Product::class);
    }
}
