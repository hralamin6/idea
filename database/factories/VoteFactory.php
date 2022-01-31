<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'idea_id'=> $this->faker->numberBetween(1, 100),
//            'user_id'=> $this->faker->numberBetween(1, 50),
//            'user_id' => $this->faker->unique->randomElement(User::pluck('id')->toArray()),

        ];
    }
}
