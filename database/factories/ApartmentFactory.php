<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apartment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->numerify('Apartment ##'),
            'isAvailable' => $this->faker->boolean,
            'count_rooms' => $this->faker->randomDigitNotNull,
            'square' => $this->faker->numberBetween($min = 10, $max = 150),
            'entrance' => $this->faker->numberBetween($min = 1, $max = 10),
            'floor' => $this->faker->numberBetween($min = 1, $max = 20),
            'price' => $this->faker->randomFloat(),
            'liter_id' => $this->faker->randomDigitNotNull
        ];
    }
}
