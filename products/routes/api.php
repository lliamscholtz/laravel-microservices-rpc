<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/http/{product:sku}', [ProductController::class, 'http']);
