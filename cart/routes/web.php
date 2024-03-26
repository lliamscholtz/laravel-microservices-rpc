<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CartController::class, 'carts']);
Route::get('/http', [CartController::class, 'http']);
Route::get('/jrpc', [CartController::class, 'jrpc']);
Route::get('/jrpc-batch', [CartController::class, 'jrpc_batch']);
