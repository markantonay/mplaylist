<?php

namespace Database\Factories;

use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistSongFactory extends Factory
{
    protected $model = PlaylistSong::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'playlist_id' => 1,
            'song_id' => function () {
                return  Song::all()->random()->id;
            },
        ];


    }
}
