<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CartController::class, 'carts']);
Route::get('/http', [CartController::class, 'http']);
