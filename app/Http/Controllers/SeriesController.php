<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Series::with('seasons')->get(); // O método with captura os relacionamentos. O orderBy está no model.
        $msgSuccess = $request->session()->get('success'); // capturando a mensagem de sucesso da requisição.
        $request->session()->forget('success'); // removendo a mensagem de sucesso da requisição.
        return view('series.index')->with('series', $series)->with('msgSuccess', $msgSuccess);
    }

    public function create() {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request) {
        $serie = Series::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQtd; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodes; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);
        $request->session()->put('success', "Série '{$serie->nome}' criada com sucesso!");
        return redirect()->route('series.index')->with('success', "Série '{$serie->nome}' criada com sucesso!");
    }
    
    public function edit(Request $request) {
        $serie = Series::find($request->idSerie);
        // dd($serie->season);
        return view('series.edit')->with('serie', $serie);
    }

    public function destroy(Request $request) {
        $serie = Series::find($request->idSerie);
        Series::destroy($request->idSerie);
        return redirect()->route('series.index')->with('success', "Série '{$serie->nome}' excluída com sucesso!");
    }

    public function update(SeriesFormRequest $request) {
        $serie = Series::find($request->idSerie);
        $serie->nome = $request->nome;
        $serie->save();
        return redirect()->route('series.index')->with('success', "Série '{$serie->nome}' editada com sucesso!");
    }
}