<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getTotalPriceAttribute()
    {
       $total_price = 0;
       foreach ($this->products as $product) {
           $total_price += $product->total_price;
       }

       return $total_price;
    }

    public function products() {
        return $this->belongsToMany('App\Product')->withPivot('amount');
    }    
    
    public function user() {
        return $this->belongsTo('App\User');
    }    
}
