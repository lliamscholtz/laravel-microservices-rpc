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
        CartProduct::factory()->create([
            'product_sku' => 'd62bfa6e-a67b-35e2-899e-857f31d3b528',
        ]);
        CartProduct::factory()->create([
            'product_sku' => 'a7b36603-dd9e-364a-aa83-cfe691739168',
        ]);
        CartProduct::factory()->create([
            'product_sku' => '04521b83-8064-3862-a20c-815222502659',
        ]);
    }
}
