<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function views(){
        return $this->hasMany(View::class);
    }
    public function sells(){
        return $this->hasMany(Sell::class);
    }
    public function prices(){
        return $this->hasMany(Price::class);
    }
}
