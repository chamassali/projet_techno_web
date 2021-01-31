<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use 

class Game extends Model
{
    public function reviews(){
        return $this->hasMany(Reviews::class);
    }
}
