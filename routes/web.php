<?php

use App\Http\Controllers\ChallengesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayersController;
use App\Models\Player;
use App\Models\Challenge;

Route::get('/player/find', [PlayersController::class, 'find']);
Route::post('/player/find_results', [PlayersController::class, 'find_results']);

Route::resource('player', PlayersController::class);
    //->only(['index', 'create', 'store', 'edit', 'update', 'show', 'destroy']);

Route::get('/', [PlayersController::class, 'index']);
Route::get('/info', [PlayersController::class, 'info']);



Route::get('/challenges/{player_id}/show', [ChallengesController::class, 'show']);
Route::get('/challenges/add', [ChallengesController::class, 'add']);
Route::post('/challenges/save', [ChallengesController::class, 'save']);






 