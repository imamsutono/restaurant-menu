<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->name();

        return [
            'parent_id' => fake()->numberBetween(1, 100),
            'name'      => $name,
            'slug'      => Str::slug($name),
            'level'     => fake()->numberBetween(0, 4)
        ];
    }
}
