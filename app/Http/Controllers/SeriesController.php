<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\ISeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private ISeriesRepository $repository) {
        
    }
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
        $serie = $this->repository->add($request);
        return redirect()
            ->route('series.index')
            ->with('success', "Série '{$serie->nome}' criada com sucesso!");  
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