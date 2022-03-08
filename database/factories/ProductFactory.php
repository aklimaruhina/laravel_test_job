<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(20);
        $slug = $this->faker->slug($title);
        return [
            'product_name' => $title,
            'slug' => 'test-product',
            'status' => 1
        ];
    }
}
