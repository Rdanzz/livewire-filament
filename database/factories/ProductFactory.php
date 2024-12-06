<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // Nama produk
            'brand' => $this->faker->company(), // Nama brand
            'color' => $this->faker->safeColorName(), // Warna (misalnya: blue, red)
            'price' => $this->faker->numberBetween(10000, 100000), // Harga dalam rentang tertentu
        ];
    }
}
