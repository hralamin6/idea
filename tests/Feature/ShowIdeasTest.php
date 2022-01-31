<?php

namespace Tests\Feature;

use App\Models\idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    public function list_of_ideas_shows_on_main_page()
    {
        $ideaOne = idea::factory()->create([
            'titile' => 'first idea itle',
            'description' => 'first idea description'
        ]);
        $ideaTwo = idea::factory()->create([
            'titile' => 'second idea itle',
            'description' => 'second idea description'
        ]);
        $response = $this->get(route('home'));
        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
    }
}
