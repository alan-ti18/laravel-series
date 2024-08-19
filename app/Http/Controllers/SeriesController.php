<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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
        for ($i = 1; $i <= $request->seasonsQtd; $i++) {
            $season = $serie->seasons()->create([
                'number' => $i
            ]);

            for ($j = 1; $j <= $request->episodes; $j++) {
                $season->episodes()->create([
                    'number' => $j
                ]);
            }
        }
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

    public function update(Series $serie, SeriesFormRequest $request) {
        $serie->fill($request->all())->save();
        return redirect()->route('series.index')->with('success', "Série '{$serie->nome}' editada com sucesso!");
    }
}