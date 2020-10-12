<?php

namespace Database\Factories;

use App\Models\Shipper;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipperFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipper::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->text('20'),
            'contact_number' => '0'.rand(9000000000, 9999999999),
            'address' => $this->faker->text('50'),

        ];
    }
}
