<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function restaurants(){
        return $this -> belongsToMany(Resturant::class);
    }
}
