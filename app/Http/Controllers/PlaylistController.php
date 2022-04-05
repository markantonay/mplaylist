<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PlaylistCollection;
use App\Models\PlaylistSong;

/**
 * @OA\Get(
 * path="/api/v1/playlist",
 * summary="Get Playlist",
 * description="Playlist of songs",
 * operationId="playlist",
 * tags={"playlist"},
 * @OA\Response(
 *    response=200,
 *    description="Success",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Playlist display"),
 *       @OA\Property(property="data", type="string", example="paginated songs and playlist")
 *        )
 *     )
 * )
 */
class PlaylistController extends Controller
{


    /**
     * Display a playlist and its songs attached to it.
     *
     * @return
     */
    public function index()
    {
        $playlist = Playlist::first();
        $songs = $playlist->songs()->paginate(5);
        $playlists = [
           'playlist' => $playlist,
           'songs' => $songs,
        ];

        return response()
            ->json([
                'data' => $playlists,
                'message' => 'Playlist display'
            ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
