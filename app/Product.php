<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public static function getProductsByBrand()
    {
        $products = DB::table('products')
                    ->rightJoin('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*')
                    ->whereNotNull('products.category_id')
                    ->get();
        
        return $products;
    }

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
