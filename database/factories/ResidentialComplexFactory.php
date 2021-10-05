<?php

namespace Database\Factories;

use App\Models\ResidentialComplex;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResidentialComplexFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResidentialComplex::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'description' => $this->faker->sentence,
            'city_id' => $this->faker->randomDigitNotNull,
            'district_id' => $this->faker->randomDigitNotNull,
            'img' => $this->faker->word . '.jpt'
        ];
    }
}
