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
        $title = ucwords($this->faker->words(4, true));

        return [
            'body' => $title,

        ];
    }
}
