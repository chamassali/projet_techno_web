<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function reviews(){
        return $this->hasMany(Reviews::class)
    }
}
