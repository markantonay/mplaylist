<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Song;

class SongTest extends TestCase
{

    /** @test*/
    public function can_create_a_song()
    {
        $data = [
            'title' => $this->faker->word,
            'artist_name' => $this->faker->name,
            'url' => $this->faker->url,
            'duration' => $this->faker->numerify('##'),
            'image' => $this->faker->image
        ];

        $response = $this->json('POST', '/api/v1/songs', $data);

        $response->assertStatus(201)
            ->dump()
            ->assertJson(compact('data'));

        $this->assertDatabaseHas('songs', [
            'title' => $data['title'],
            'artist_name' => $data['artist_name'],
            'url' => $data['url'],
            'duration' => $data['duration'],
            'image' => $data['image']
        ]);
    }

    /** @test*/
    public function can_edit_a_song()
    {
        $song = Song::factory()->create();

        $data = [
            'title' => $this->faker->word,
            'artist_name' => $this->faker->name,
            'url' => $this->faker->url,
            'duration' => $this->faker->numerify('##'),
            'image' => $this->faker->image
        ];

        $response = $this->json('PATCH', '/api/v1/songs/' .$song->id, $data);

        $response->assertStatus(201)
            ->dump()
            ->assertJson(compact('data'));

        $this->assertDatabaseHas('songs', [
            'title' => $data['title'],
            'artist_name' => $data['artist_name'],
            'url' => $data['url'],
            'duration' => $data['duration'],
            'image' => $data['image']
        ]);
    }


    /** @test*/
    public function can_get_a_song()
    {
        $song = Song::factory()->create();

        $response = $this->json('GET', '/api/v1/songs/' .$song->id);


        $response->assertStatus(201)
            ->dump();

        $this->assertDatabaseHas('songs', $song->toArray());

    }

    /** @test*/
    public function can_delete_a_song()
    {
        $song = Song::factory()->create();

        $response = $this->json('DELETE', '/api/v1/songs/'.$song->id);

        $response->assertStatus(201)
            ->dump();


        $this->assertDatabaseHas('songs', $song->toArray());
    }
}
