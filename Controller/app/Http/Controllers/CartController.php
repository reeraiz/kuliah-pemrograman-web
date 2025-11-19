<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] ?? $item['harga']) * $item['qty'];
        }, 0);

        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;

        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = ['id'=>$id, 'name'=>$name, 'price'=>$price, 'qty'=>1];
        }

        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;
        $qty = $request->qty;

        if(isset($cart[$id])) {
            $cart[$id]['qty'] = $qty;
        }

        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;

        if(isset($cart[$id])) {
            unset($cart[$id]);
        }

        session(['cart' => $cart]);
        return redirect()->back();
    }
}
