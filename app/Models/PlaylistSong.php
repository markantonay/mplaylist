<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Song;
use Playlist;

class PlaylistSong extends Model
{
    use HasFactory;

    protected $table = 'playlist_song';

    protected $fillable = ['playlist_id', 'song_id'];

    public $timestamps = true;

    public function song()
    {
        return $this->belongTo(Song::class, 'song_id', 'id');
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id', 'id');
    }
}
