<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Song;

/**
 * @OA\Get(
 * path="/api/v1/songs/{id}",
 * summary="Get Song",
 * description="song",
 * operationId="song",
 * tags={"song"},
 * @OA\Parameter(
 *    description="ID of song",
 *    in="path",
 *    name="song_id",
 *    required=true,
 *    example="1",
 *    @OA\Schema(
 *       type="integer",
 *       format="int64"
 *    )
 * )
 * @OA\Response(
 *    response=200,
 *    description="Success",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Song display"),
 *       @OA\Property(property="data", type="string", example="song details")
 *        )
 *     )
 * )
 */

class SongController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth:api')->except(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CreateSongRequest $request)
    {

        $song = Song::create($request->only([
                'title',
                'artist_name',
                'url',
                'duration',
                'image'
            ]));


        return response()
            ->json([
                'data' =>  $song,
                'message' => 'Song created'
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);

        return response()
            ->json([
                'data' => $song,
                'message' => 'Song display'
            ], 201);
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
    public function update(UpdateSongRequest $request, $id)
    {
        $song = Song::findOrFail($id);

        $song->update($request->only([
            'title',
            'artist_name',
            'url',
            'duration',
            'image'
        ]));


        return response()
            ->json([
                'data' => $song,
                'message' => 'Song updated'
            ], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Song::findOrFail($id)->delete();

        return response()
            ->json([
                'message' => 'Song deleted'
            ], 201);

    }
}
