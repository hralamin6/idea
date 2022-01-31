<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use function Symfony\Component\String\Slugger\slug;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = ucwords($this->faker->words(2, true));
        return [
            'name'=> $title,
//            'slug'=> Str::slug($title),
            'status'=>'active'

        ];
    }
}
