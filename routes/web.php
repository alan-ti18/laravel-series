<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Local onde ficam as rotas da aplicação. Estas rotas são carregadas pelo
| ServiceProvider e todas elas poderão ser acessadas pelo grupo de
| middlewares "web".
*/

// Rotas de Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('signin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(Autenticador::class)->group(function () {
    Route::get('/', function () {
        return redirect(route('series.index'));
    });
    
    // Rotas de Séries
    Route::controller(SeriesController::class)->group(function () {
        Route::get('/series', 'index')->name('series.index');
        Route::get('/series/create', 'create')->name('series.create');
        Route::get('series/edit/{idSerie}', 'edit')->name('series.edit')->whereNumber('idSerie');
        Route::post('/series/store', 'store')->name('series.store');
        Route::put('/series/update/{idSerie}', 'update')->name('series.update')->whereNumber('idSerie');
        Route::delete('/series/destroy/{idSerie}', 'destroy')->name('series.destroy')->whereNumber('idSerie');
    });
    
    // Rotas de Temporadas
    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index')->whereNumber('series');
    
    // Rotas de Episódios
    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index')->whereNumber('season');
    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');

    // Rotas de Usuários
    Route::get('/register', [UsersController::class, 'create'])->name('register');
    Route::post('/register', [UsersController::class, 'store'])->name('users.store');
}
);