<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'songs';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'artist_name',
        'url',
        'duration',
        'image'
    ];

     /**
     * The song that belong to the playlist.
     */
    public function playlist()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_song', 'song_id' ,'id');
    }
}
