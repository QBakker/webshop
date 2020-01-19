<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $request->session()->get('cart_items');

        if (!$items) {
            $items = [];
        }
        
        // & teken houdt de koppeling tussen de $items array en de index.
        // In dit geval is $item gekoppeld aan $items[0], $items[1], $items[2];
        $totaal = 0;
        foreach ($items as &$item) {
            $item['product'] = Product::find($item['id']);

            $totaal = $totaal + ($item['product']->price * $item['amount']);

            // $item wordt vergeten.
            unset($item);
        }

        // Hier niet meer toevallig de laatste $item aanpast.
        
        return view('cart.index', ['items' => $items, 'totaal' => $totaal]);
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
            'productID' => 'required|exists:products,id',
            'amount' => 'required',
        ]);

        $items = $request->session()->get('cart_items');

        if (!$items) {
            $items = [];
        }
        
        $found = false;
        foreach ($items as $item) {
            if ($item['id'] === $validated['productID']) {
                $found = true;
            }
        }

        if (!$found) {
            $items[] = [
                'id' => $validated['productID'],
                'amount' => $validated['amount']
            ];
        } else {
            foreach ($items as &$item) {
                if ($item['id'] === $validated['productID']) {

                    if ($validated['amount'] == 0) {
                        return $this->destroy($request);
                    }

                    $item['amount'] = $validated['amount'];
                }
                unset($item);
            }

        }

        $request->session()->put('cart_items', $items);
        
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
        $validated = $this->validate($request, [
            'productID' => 'required|exists:products,id',
        ]);

        $items = $request->session()->get('cart_items');

        if (!$items) {
            $items = [];
        }
        
        $found = false;
        foreach ($items as $index => $item) {
            if ($item['id'] === $validated['productID']) {
                $found = $index;
            }
        }

        if ($found !== false) {
            array_splice($items, $index, 1);
        }

        $request->session()->put('cart_items', $items);   
        
        return back();
    }
}
