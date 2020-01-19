<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function getTotalPriceAttribute()
    {
        return $this->price * $this->pivot->amount;
    }

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
