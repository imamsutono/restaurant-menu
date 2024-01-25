<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'category_id' => fake()->numberBetween(1, 100),
            'parent_id'   => fake()->numberBetween(1, 100),
            'name'        => $name,
            'slug'        => Str::slug($name),
            'price'       => fake()->randomNumber(5, true),
        ];
    }
}
