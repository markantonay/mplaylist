<?php

namespace Tests\Feature;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\PlaylistSong;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlaylistTest extends TestCase
{
    /** @test */
    public function can_get_a_playlist_of_songs()
    {
        $playlist = Playlist::factory()->create();
        $songs = Song::factory()->count(10)->create();
        for($i = 0; $i < 10; $i++){
            $playlistSong = PlaylistSong::create(['playlist_id' => 1, 'song_id' => Song::all()->random()->id]);
        }

        $response = $this->json('GET','/api/v1/playlist');


        $response->assertStatus(201)
            ->dump();


        $this->assertDatabaseHas('playlist_song', $playlistSong->toArray());

    }
}
