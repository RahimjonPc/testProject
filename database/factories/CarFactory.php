<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 9),
            'model' => $this->faker->name(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
