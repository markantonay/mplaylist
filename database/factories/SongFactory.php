<?php

namespace Database\Factories;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SongFactory extends Factory
{
    protected $model = Song::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'artist_name' => $this->faker->name,
            'url' => $this->faker->url,
            'duration' => $this->faker->numerify('##'),
            'image' => $this->faker->image
        ];

    }
}
