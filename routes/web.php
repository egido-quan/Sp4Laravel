<?php

use App\Http\Controllers\ChallengesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayersController;
use App\Models\Player;
use App\Models\Challenge;

Route::get('/', [PlayersController::class, 'index']);
Route::get('/info', [PlayersController::class, 'info']);

Route::get('/player/add', [PlayersController::class, 'add']);
Route::post('/player/save', [PlayersController::class, 'save']);
Route::get('/player/{id}/edit', [PlayersController::class, 'edit']);
Route::put('/player/{id}', [PlayersController::class, 'update']);
Route::delete('/player/{id}', [PlayersController::class, 'delete']);
Route::get('/player/{ranking}/show', [PlayersController::class, 'player']);

Route::get('/challenges/{player_id}/show', [ChallengesController::class, 'show']);
Route::get('/challenges/add', [ChallengesController::class, 'add']);
Route::post('/challenges/save', [ChallengesController::class, 'save']);


Route::get('/prueba', function (){

    /*$player = Player::where('id', 36)
        ->with('challenges_1')
        ->with('challenges_2')
        ->first();
    return $player;*/
    
    //return [$player->challenges_1, $player->challenges_2];


/*
    $challenge = new Challenge;

    $challenge->player1_id = 46;
    $challenge->player2_id = 36;
    $challenge->p1_set1 = 6;
    $challenge->p1_set2 = 4; 
    $challenge->p1_set3 = 6;
    $challenge->p2_set1 = 7;
    $challenge->p2_set2 = 6;
    $challenge->p2_set3 = 1;

    $challenge->save();

    return $challenge;


    $player = new Player;

    $player->name = 'Serena';
    $player->family_name = 'Politana';
    $player->ranking = 5;
    $player->email = 'serena@politana.com';
    $player->height = 178;
    $player->playing_hand = 'right';   
    $player->backhand_style = 'two hands';
    $player->briefing = 'Hola me llamo Serena';
    $player->picture_route = 'images/serena.jpg';

    $player->save();

    return $player;
    */
});

 