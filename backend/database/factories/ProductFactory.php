<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
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
            'brand_id' => Brand::factory(),
            'category_id' => Category::factory(),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence(),
            'image' => $this->faker->image(),
            'price' => $this->faker->randomNumber(2) * 100
        ];
    }
}
