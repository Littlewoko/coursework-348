<?php

namespace Database\Factories;
use App\Models\Consumer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsumerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
        ];
    }
}
