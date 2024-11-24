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
        ->with('challenges_1') //Hay que comprobar si el jugador está en el campo player_1 o player_2
        ->with('challenges_2')
        ->first();

        $challenges = [];

        $challenges = self::challenges($player->challenges_1, $player, $challenges);

        $challenges = self::challenges($player->challenges_2, $player, $challenges);

        return view('challenges.challenges', [
            'players' => $players,
            'challenges' => $challenges
        ]);
    }


    protected function challenges($playerChallenges, $player, $challenges) {

        if (count($playerChallenges) > 0) {
            $ch = $playerChallenges;
            for ($i = 0; $i < count($ch); $i++) {
                $other_player_id = ($player->id == $ch[$i]["player1_id"]) ? $ch[$i]["player2_id"] : $ch[$i]["player1_id"];
                if ($other_player_id == $ch[$i]["player2_id"]) {
                    $challenges = self::challengesArray($ch[$i], $player->name, $player->family_name,
                    Player::where('id', $other_player_id)->value('name'), Player::where('id', $other_player_id)->value('family_name'), $challenges);

                } else { 
                    $challenges = self::challengesArray($ch[$i], Player::where('id', $other_player_id)->value('name'),
                    Player::where('id', $other_player_id)->value('family_name'), $player->name, $player->family_name,  $challenges);
                }
            }
        }  

        return $challenges;
    }
    
    protected function challengesArray($ch, $p1_name, $p1_f_name, $p2_name, $p2_f_name, $challenges) {

        $challenges[] = [
        $p1_name, $p1_f_name,
        $p2_name, $p2_f_name,
        $ch["p1_set1"], $ch["p1_set2"], $ch["p1_set3"], 
        $ch["p2_set1"], $ch["p2_set2"], $ch["p2_set3"],
        $ch["created_at"]->format('d-m-Y')
        ];
                    
        return $challenges;
    }

    public function add() {
        $players = Player::orderBy('ranking')->get();

        return view('challenges.add', ['players' => $players]);
        

    }

    public function save(Request $request) {

        $player1_ranking = (int)explode(" ",$request->player1_ranking)[0];
        $player2_ranking = (int)explode(" ",$request->player2_ranking)[0];
        $players = Player::orderBy('ranking')->get();

        $message = self::checkRanking($player1_ranking, $player2_ranking);
        $message = ($message == "OK") ? self::checkSet($request->p1_set1, $request->p2_set1) : $message;
        $message = ($message == "OK") ? self::checkSet($request->p1_set2, $request->p2_set2) : $message;
        if ($message == "OK") {
            if (!($request->p1_set3 == null && $request->p2_set3 == null)) {
                $message = self::checkSet($request->p1_set3, $request->p2_set3);
            }
        }     

        if (!($message === "OK")) {
            return view('challenges.addError', [
                'players' => $players,
                'message' => $message
            ]);
        }

        $score = ($request->p1_set3 == null && $request->p2_set3 == null) ?
            [$request->p1_set1, $request->p2_set1, $request->p1_set2, $request->p2_set2] :
            [$request->p1_set1, $request->p2_set1, $request->p1_set2, $request->p2_set2, $request->p1_set3, $request->p1_set3];
        
        $marcador = new Marcador($score, $player1_ranking, $player2_ranking);
        $player1 = Player::where('ranking', $player1_ranking)->first();
        $player2 = Player::where('ranking', $player2_ranking)->first();
        if ($marcador->ganador() == max($player1_ranking, $player2_ranking)) {
            $player1->ranking = $player2_ranking;
            $player1->save();
            $player2->ranking = $player1_ranking;
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

    protected function checkRanking($p1_ranking, $p2_ranking) {

        if ($p1_ranking === $p2_ranking) {
            $message = 'One player cannot challenge himself';
        } elseif (abs($p1_ranking - $p2_ranking) > 3) {
            $message = 'Cannot accept this challenge, sorry. A challenge is only allowed when ranking difference is 3 positions or lower';
        } else {
            $message = "OK";
        }
        return $message;
    }

    protected function checkSet($p1_Score, $p2_Score) {
        if (($p1_Score == 7 && $p2_Score == 7) || 
            (($p1_Score == 7 || $p2_Score == 7) && abs($p1_Score - $p2_Score) > 2) ||
            (($p1_Score < 7 && $p2_Score < 7) && abs($p1_Score - $p2_Score) < 2) ||
            (($p1_Score < 6 && $p2_Score < 6))) {
            $message = 'Wrong score';
        } else {
            $message = "OK";
        }
        return $message;
    }
}

