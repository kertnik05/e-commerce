<?php

namespace Database\Factories;

use App\Models\CheckoutDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckoutDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CheckoutDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'checkout_id' => rand(1, 10),
            'order_id' => rand(1, 5),
            'price' => $this->faker->randomNumber(2) * 100
        ];
    }
}
