<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => $this->faker->date,
            'weight' => $this->faker->numberBetween(1, 100),
            'calories' => $this->faker->numberBetween(100, 3000),
            'execise_time' => $this->faker->time,
            'execise_content' => $this->faker->text(120),
        ];
    }
}
