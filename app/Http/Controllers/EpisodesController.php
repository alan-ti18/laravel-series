<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request as HttpRequest;

class EpisodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Season $season)
    {
        return view('episodes.index', ['episodes' => $season->episodes, 'season' => $season, 'msgSuccess' => session('msgSuccess')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEpisodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Episode $episode)
    {
        //
    }

    public function update(HttpRequest $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
            $episode->completed = in_array($episode->id, $watchedEpisodes);
        });

        $season->push();

        return to_route('episodes.index', $season->id)->with('msgSuccess', 'Episódios atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episode $episode)
    {
        //
    }
}
