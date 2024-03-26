<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cart::factory(3)->create();
        CartProduct::factory(3)->create();
    }
}
