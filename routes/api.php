<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\SoccerFieldController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['prefix' =>  'game'], function () {
    Route::get('/', [GameController::class, 'all'])->name('game.all');
    Route::post('/', [GameController::class, 'create'])->name('game.create');

    Route::post('{game_id}/confirm-players', [GameController::class, 'confirmPlayers'])->name('game.confirm_players');
});

Route::group(['prefix' =>  'soccer-field'], function () {
    Route::get('/', [SoccerFieldController::class, 'all'])->name('soccer-field.all');
});

Route::group(['prefix' =>  'raffle'], function () {
    Route::post('/', [RaffleController::class, 'create'])->name('raffle.create');
});
