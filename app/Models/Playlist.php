<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PlaylistSong;

class Playlist extends Model
{
    use HasFactory;

    protected $table = 'playlist';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description'
    ];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'playlist_song', 'playlist_id', 'id');
    }

}
