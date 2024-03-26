<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'cart_id' => Cart::factory(), // uses cart factory to create a cart
            'cart_id' => 1, // uses cart factory to create a cart
            'product_sku' => $this->faker->uuid(),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
