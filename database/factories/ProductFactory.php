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
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $photo = explode('storage/', fake()->image(public_path('storage/products')))[1];
        return [
            'price' => fake()->randomNumber(2),
            'name' => fake()->domainName(),
            'photo' => $photo,
            'description' => fake()->text(500),
            'brand' => fake()->userName()
        ];
    }
}
