<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->realText(50, 5),
            'min_budget' => fake()->numberBetween(1000, 2000),
            'max_budget' => fake()->numberBetween(2000, 10000),
            'holiday' => fake()->realText(10, 5),
            'opening_hour' => fake()->realText(10, 5),
            'post_code' => fake()->postcode(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'category_id' => 1,
        ];
    }
}
