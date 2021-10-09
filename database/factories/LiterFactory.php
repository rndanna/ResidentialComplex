<?php

namespace Database\Factories;

use App\Models\Liter;
use Illuminate\Database\Eloquent\Factories\Factory;

class LiterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Liter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->numerify('Liter ##'),
            'completion_date' => $this->faker->date,
            'complex_id' => $this->faker->randomDigitNotNull
        ];
    }
}
