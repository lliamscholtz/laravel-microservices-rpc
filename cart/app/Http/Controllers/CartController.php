<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function carts()
    {
        $carts = Cart::with('products')->get()->toArray();
        dd('carts', $carts);
    }

    public function http(): JsonResponse
    {
        $cart = Cart::with('products')->first()->toArray();

        $cart['products'] = array_map(function ($product) {
            $product['product'] = Http::get('http://127.0.0.1:8001/api/http/'.$product['product_sku'])->json();

            return $product;
        }, $cart['products']);

        return response()->json($cart);
    }
}
