<?php

use App\Http\Controllers\ProductController;
use App\Http\Procedures\ProductProcedure;
use Illuminate\Support\Facades\Route;

Route::get('/http/{product:sku}', [ProductController::class, 'http']);
Route::rpc('/jrpc', [ProductProcedure::class])->name('rpc.endpoint');
