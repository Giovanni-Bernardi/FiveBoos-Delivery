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
    ];

    public function user(){
        return $this -> belongsTo(User::class);
    }
}
