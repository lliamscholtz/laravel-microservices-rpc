<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(): View
    {
        dd(Product::all()->toArray());
    }

    public function http(Product $product): JsonResponse
    {
        return response()->json($product);
    }
}
