<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Models\Player;

class ChallengesController extends Controller
{
    public function show($player_id) {
        $players = Player::all();
        $player = Player::where('id', $player_id)
        ->with('challenges_1')
        ->with('challenges_2')
        ->first();

        $challenges = [];
        if (count($player->challenges_1) > 0) {
            $ch1 = $player->challenges_1;
            for ($i = 0; $i < count($ch1); $i++) {
                $other_player_id = ($player_id == $ch1[$i]["player1_id"]) ? $ch1[$i]["player2_id"] : $ch1[$i]["player1_id"];
                $challenges[] =
                [$player->name, $player->family_name,
                Player::where('id', $other_player_id)->value('name'),
                Player::where('id', $other_player_id)->value('family_name'),
                $ch1[$i]["p1_set1"], $ch1[$i]["p1_set2"], $ch1[$i]["p1_set3"], 
                $ch1[$i]["p2_set1"], $ch1[$i]["p2_set2"], $ch1[$i]["p2_set3"],
                $ch1[$i]["created_at"]->format('d-m-Y')
                ];
            }
        }
        if (count($player->challenges_2) > 0) {
            $ch2 = $player->challenges_2;
            for ($i = 0; $i < count($ch2); $i++) {
                $other_player_id = ($player_id == $ch2[$i]["player1_id"]) ? $ch2[$i]["player2_id"] : $ch2[$i]["player1_id"];
                $challenges[$i] =
                [$player->name, $player->family_name,
                Player::where('id', $other_player_id)->value('name'),
                Player::where('id', $other_player_id)->value('family_name'),
                $ch2[$i]["p1_set1"], $ch2[$i]["p1_set2"], $ch2[$i]["p1_set3"], 
                $ch2[$i]["p2_set1"], $ch2[$i]["p2_set2"], $ch2[$i]["p2_set3"],
                $ch2[$i]["created_at"]->format('d-m-Y')
                ];
            }
        }
        
        

    //return $challenges;
    return view('players.challenges', [
        'players' => $players,
        'challenges' => $challenges
]);


    }
}
