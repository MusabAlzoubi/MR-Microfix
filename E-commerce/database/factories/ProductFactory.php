<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
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
        $product_name = $this->faker->unique()->words($nb=6,$asText = true);
        $slug = Str::slug($product_name,'-');
        return [
            'name' => $product_name ,
            'slug' => $slug ,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10,500),
            'image' => 'product-'.$this->faker->numberBetween(10,500),
            'images' => 'product-'.$this->faker->numberBetween(10,500)
 

        ];
    }
}
