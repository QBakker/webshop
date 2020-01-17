<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        foreach ($orders as $order) {

            // json_decode zet de string weer om in een array.
            $items = json_decode($order->items);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = $request->session()->get('cart_items');
        $order = [];

        // json_encode veranderd de array zoals:
        // $items = [
        //     ['productID' => 5, 'amount' => 2],
        //     ['productID' => 6, 'amount' => 1]
        // ];

        // in een string:
        // $items = '[{productID:5,amount:2},{productID:6,amount:1}]';

        
        // Vervolgens kan je het opslaan in een test kolom.
        $order->items = json_encode($items);

        return view('order.index', [
            'items' => $items, 
            'order' => $order
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
