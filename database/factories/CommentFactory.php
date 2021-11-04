<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'time_posted' => $this->faker->time($format = 'H:i:s', $max = '23:59:59'),
            'comment_text' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'consumer_id' => 1,
        ];
    }
}
