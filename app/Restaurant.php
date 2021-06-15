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
        'telephone'
    ];
    
    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function types(){
        return $this -> belongsToMany(Type::class);
    }

    public function products(){
        return $this -> hasMany(Products::class);
    }
}
