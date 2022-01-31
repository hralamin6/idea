<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\idea;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Hr Alamin',
            'email' => 'hralamin2020@gmail.com'
        ]);
//        User::factory(19)->create();
        User::factory(50)->create();
        Category::factory(20)->create();
        Idea::factory(100)->create();

        foreach (range(1, 100) as $idea_id){
            foreach (range(rand(1, 20), rand(1, 20)) as $user_id) {
                \App\Models\Vote::factory()->create([
                        'idea_id'=> $idea_id,
                        'user_id'=> $user_id,
                    ]);
            }
        }
        foreach (range(1, 100) as $idea_id){
            foreach (range(rand(1, 20), rand(1, 20)) as $user_id) {
                    Comment::factory()->create([
                        'idea_id'=> $idea_id,
                        'user_id'=> $user_id,
                    ]);
            }
        }
    }
}
