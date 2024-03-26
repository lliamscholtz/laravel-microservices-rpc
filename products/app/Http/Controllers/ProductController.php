<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(): View
    {
        dd(Product::all()->toArray());
    }
}
