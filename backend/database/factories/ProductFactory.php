<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => rand(1, 10),
            'category_id' => rand(1, 10),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence(),
            'image' => $this->faker->image(),
            'quantity' => rand(1, 100),
            'price' => $this->faker->randomNumber(2) * 100
        ];
    }
}
