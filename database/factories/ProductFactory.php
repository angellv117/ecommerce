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
        return [
            'name' => $this->faker->name,
            'sku' => $this->faker->unique()->randomNumber(8),
            'description' => $this->faker->sentence,
            'image_path' => "products/logo.png",
            'price' => $this->faker->randomFloat(2, 1, 100),
            'is_active' => true,
            'presentation_id' => $this->faker->numberBetween(1, 3),
            'subcategory_id' => $this->faker->numberBetween(1, 7),
            'max_temperature' => $this->faker->randomFloat(2, 1, 100),
            'min_temperature' => $this->faker->randomFloat(2, 1, 100),
            'time_to_melt' => $this->faker->randomFloat(2, 1, 100),
            'temperature_to_melt' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
