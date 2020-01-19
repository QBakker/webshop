<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
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
        $orders = auth()->user()->orders;

        return view('order.index')->with([
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $items = $request->session()->get('cart_items');

        foreach ($items as &$item) {
            $item['product'] = Product::find($item['id']);

            unset($item);
        }

        return view('order.create')->with([
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $this->validate($request, [
            'address' => 'required|string',
            'housenumber' => 'required|string',
            'zipcode' => 'required|string',
            'residence' => 'required|string',
            
            ]);
            
        $order = new Order();

        $order->address = $validated['address'];
        $order->housenumber = $validated['housenumber'];
        $order->zipcode = $validated['zipcode'];
        $order->residence = $validated['residence'];

        auth()->user()->orders()->save($order);

        $items = $request->session()->get('cart_items');
        foreach ($items as $item) {
            $order->products()->attach(
                $item['id'], 
                ['amount' => $item['amount']
            ]);
        }

        $request->session()->put('cart_items', []);

        return redirect()->route('order.show', ['order' => $order]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show')->with([
            'order' => $order,
        ]);
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
