<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Cart::getCart($request);
        $total = Cart::calculateTotalPrice($items);

        return view('cart.index', ['items' => $items, 'total' => $total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'productID' => [
                'required',
                'exists:products,id',
            ],
            'amount' => [
                'required',
            ],
        ]);

        Cart::addToCart($request);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'productID' => [
                'required',
                'exists:products,id',
            ],
        ]);

        Cart::removeFromCart($request);
        
        return back();
    }
}
