<?php

namespace Database\Factories;

use App\Models\Category;
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
            'scientific_name' => $this->faker->word,
            'trading_name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'date_of_validity' => $this->faker->date,
            'manufacturer' => $this->faker->company,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'sell_price' => $this->faker->randomFloat(2, 1, 1000),
            'quantity' => $this->faker->randomNumber(),
            'category_id' => Category::factory()->create()->id,
            'image' => $this->faker->imageUrl(200, 200, 'products'),
        ];
    }
}
