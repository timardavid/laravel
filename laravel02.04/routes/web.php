<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/searchGames', [GameController::class, 'search'])->name('game.search');

Route::resource('/games',GameController::class);
Route::resource('/developers', DeveloperController::class);