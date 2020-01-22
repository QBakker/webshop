<?php

namespace App\Helpers;

use App\Product;

class Cart
{
    public static function getCart($request)
    {
        $items = $request->session()->get('cart_items');

        foreach ($items as &$item) {
            $item['product'] = Product::find($item['id']);

            // $item wordt vergeten.
            unset($item);
        }
        // unset $item wordt gebruikt zodat het laatste $item 
        // hier niet meer toevallig aangepast kan worden.

        if (!$items) {
            $items = [];
        }

        return $items;

    }

    public static function addToCart($request)
    {
        $items = Self::getCart($request);

        $foundIndex = -1;
        foreach ($items as $index => $item) {
            if ($item['id'] === $request->productID) {
                $foundIndex = $index;
            }
        }

        if ($foundIndex < 0) {
            $items[] = [
                'id' => $request->productID,
                'amount' => $request->amount
            ];
        } else {
            if ($request->amount == 0) {
                return Self::removeFromCart($request);
            }
            $items[$foundIndex]['amount'] = $request->amount;
        }


        $request->session()->put('cart_items', $items);
    }

    public static function calculateTotalPrice($items)
    {
        // & teken houdt de koppeling tussen de $items array en de index.
        // In dit geval is $item gekoppeld aan $items[0], $items[1], $items[2];
        $total = 0;
        foreach ($items as $item) {
            $total = $total + ($item['product']->price * $item['amount']);
        }

        return $total;
    }

    public static function removeFromCart($request)
    {
        $items = Self::getCart($request);

        $found = -1;
        foreach ($items as $index => $item) {
            if ($item['id'] === $request->productID) {
                $found = $index;
            }
        }

        if ($found >= 0) {
            array_splice($items, $found, 1);
        }

        $request->session()->put('cart_items', $items);
    }
}
