<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id'    => fake()->numberBetween(1, 100),
            'type'       => fake()->randomElement(config('custom.menu_type')),
            'percentage' => fake()->numberBetween(1, 100)
        ];
    }
}
