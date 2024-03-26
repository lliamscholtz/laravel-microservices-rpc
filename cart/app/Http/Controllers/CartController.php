<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('products')->get()->toArray();

        // Pluck and fetch from products microservice using rpc

        dd($carts);
    }
}
