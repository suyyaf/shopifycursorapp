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
        $name = $this->faker->unique()->words(3, true);

        return [
            'name' => $name,
            'slug' => str($name)->slug(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'currency' => 'USD',
            'sku' => strtoupper($this->faker->bothify('SKU-#####')),
            'stock' => $this->faker->numberBetween(0, 200),
            'is_active' => $this->faker->boolean(85),
            'images' => [$this->faker->imageUrl(800, 800, 'product', true)],
        ];
    }
}
