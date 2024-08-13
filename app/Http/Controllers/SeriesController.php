<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::query()->orderBy('nome')->get();
        $msgSuccess = $request->session()->get('success');
        $request->session()->forget('success');
        return view('series.index')->with('series', $series)->with('msgSuccess', $msgSuccess);
    }

    public function create() {
        return view('series.create');
    }

    public function edit(Request $request) {
        $serie = Serie::find($request->idSerie);
        // dd($serie->id);
        return view('series.edit')->with('serie', $serie);
    }

    public function store(Request $request) {
        $serie = Serie::create($request->all());
        $request->session()->put('success', "Série '{$serie->nome}' criada com sucesso!");
        return redirect()->route('series.index')->with('success', "Série '{$serie->nome}' criada com sucesso!");
    }

    public function destroy(Request $request) {
        $serie = Serie::find($request->idSerie);
        Serie::destroy($request->idSerie);
        return redirect()->route('series.index')->with('success', "Série '{$serie->nome}' excluída com sucesso!");
    }

    public function update(Request $request) {
        $serie = Serie::find($request->idSerie);
        // Serie::where('id', $request->idSerie)->update($request->all());
        return redirect()->route('series.index')->with('success', "Série '{$serie->nome}' editada com sucesso!");
    }
}