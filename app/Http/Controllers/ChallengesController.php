<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Models\Player;
use App\Helpers\Marcador;

class ChallengesController extends Controller
{
    public function show($player_id) {
        $players = Player::orderBy('ranking')->get();
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
        return view('challenges.challenges', [
            'players' => $players,
            'challenges' => $challenges
        ]);
    }

    public function add() {
        $players = Player::orderBy('ranking')->get();

        return view('challenges.add', ['players' => $players]);
        

    }

    public function save(Request $request) {
        $players = Player::orderBy('ranking')->get();
        $message = match(true) {
            $request->player1_ranking === $request->player2_ranking => 'One player cannot challenge himself',
            abs($request->p1_set1 - $request->p2_set1) < 2 => 'First set result is not correct',
            abs($request->p1_set2 - $request->p2_set2) < 2 => 'Second set result is not correct',
            abs($request->player1_ranking - $request->player2_ranking) > 3 
                => 'Cannot accept this challenge, sorry. A challenge is only allowed when ranking difference is 3 positions or lower',
            default => "OK",
        };

        if ($message === "OK" && ($request->p1_set3 != null || $request->p2_set3 != null)) {  
            $message = (abs($request->p1_set3 - $request->p2_set3) < 2) ? 'Third set result is not correct' : 'OK';
        }

        if (!($message === "OK")) {
            return view('challenges.addError', [
                'players' => $players,
                'message' => $message
            ]);
        }

        if ($request->p1_set3 == null && $request->p2_set3 == null) { 
            $p1_set3 = 0;
            $p2_set3 = 0;
        } else {
            $p1_set3 = $request->p1_set3;
            $p2_set3 = $request->p2_set3;
        }

        $score = [$request->p1_set1, $request->p2_set1, $request->p1_set2, $request->p2_set2, $p1_set3, $p2_set3];
        $marcador = new Marcador($score, $request->player1_ranking, $request->player1_ranking);
        $player1 = Player::where('ranking', $request->player1_ranking)->first();
        $player2 = Player::where('ranking', $request->player2_ranking)->first();
        if ($marcador->ganador() == min($request->player1_ranking, $request->player2_ranking)) {
            $player1->ranking = $request->player2_ranking;
            $player1->save();
            $player2->ranking = $request->player1_ranking;
            $player2->save();
            }
        

        $challenge = new Challenge();

        $challenge->player1_id = Player::where('ranking', $request->player1_ranking)->value('id');
        $challenge->player2_id = Player::where('ranking', $request->player2_ranking)->value('id');
        $challenge->p1_set1 = $request->p1_set1;
        $challenge->p1_set2 = $request->p1_set2;
        $challenge->p1_set3 = ($request->p1_set3 == null) ? 0 : $request->p1_set3;
        $challenge->p2_set1 = $request->p2_set1; 
        $challenge->p2_set2 = $request->p2_set2;
        $challenge->p2_set3 = ($request->p2_set3 == null) ? 0 : $request->p2_set3;

        $challenge->save();

        $players = Player::orderBy('ranking')->get();
        
        return view('players.index', ['players' => $players]);      

    }    
}

