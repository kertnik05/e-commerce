<?php

namespace Database\Factories;

use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['M', 'F']),
            'birthdate' => $this->faker->date(),
            'address' => $this->faker->address,
            'shipping_address' => $this->faker->address
        ];
    }
}
