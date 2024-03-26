<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Sajya\Client\Client;

class CartController extends Controller
{
    // This method fetches all carts
    public function carts(): JsonResponse
    {
        $carts = Cart::with('products')->get()->toArray();

        return response()->json($carts);
    }

    // This method is used to demonstrate the HTTP client.
    public function http(): JsonResponse
    {
        $cart = Cart::with('products')->first()->toArray();

        $cart['products'] = array_map(function ($product) {
            $product['product'] = Http::get('http://127.0.0.1:8001/api/http/'.$product['product_sku'])->json();

            return $product;
        }, $cart['products']);

        return response()->json($cart);
    }

    // This method is used to demonstrate the JSON-RPC client.
    public function jrpc(): JsonResponse
    {
        $cart = Cart::with('products')->first()->toArray();
        $client = new Client(Http::baseUrl('http://127.0.0.1:8001/api/jrpc'));

        $cart['products'] = array_map(function ($product) use ($client) {
            $product['product'] = $client->execute('product@get', ['sku' => $product['product_sku']])->result();

            return $product;
        }, $cart['products']);

        return response()->json($cart);
    }

    // This method is used to demonstrate the JSON-RPC client batch request.
    public function jrpc_batch(): JsonResponse
    {
        $cart = Cart::with('products')->first()->toArray();
        $client = new Client(Http::baseUrl('http://127.0.0.1:8001/api/jrpc'));

        // You can also make batch requests, where multiple procedures are called in a single HTTP request.
        // This can be achieved using the batch method of the Client class.
        $responses = $client->batch(function (Client $client) use ($cart) {
            array_map(function ($product) use ($client) {
                $client->execute('product@get', ['sku' => $product['product_sku']]);
            }, $cart['products']);
        })->toArray();

        // The result method of the Response class is used to get the result of the procedure call.
        $products = array_map(function ($response) {
            return $response->result();
        }, $responses);

        // Merge the cart and results arrays
        $cart['products'] = array_map(function ($product) use ($products) {
            $product['product'] = array_values(array_filter($products, function ($item) use ($product) {
                return $item['sku'] === $product['product_sku'];
            }))[0];

            return $product;
        }, $cart['products']);

        return response()->json($cart);
    }
}
