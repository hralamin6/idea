<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = ucwords($this->faker->words(4, true));
        $status = $this->faker->randomElement(['open', 'considering', 'in-progress', 'implemented','closed']);

        return [
            'category_id'=> $this->faker->numberBetween(1, 20),
            'user_id'=> $this->faker->numberBetween(1, 50),
            'title'=> $title,
            'status'=> $status,
            'description'=> $this->faker->paragraph(5),
        ];
    }
}
