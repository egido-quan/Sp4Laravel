<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index() {
        $players = Player::orderBy('ranking')->get();
        return view('players.index', ['players' => $players]);
    }

    public function info() {
        $players = Player::all();
        return view('players.info', [
            'players' => $players
    ]);
    }

    public function player($ranking) {
        $players = Player::all();
        $player = Player::where('ranking', $ranking)->first();
        return view('players.player', [
            'player' => $player,
            'players' => $players
    ]);
    }

    public function add() {
        $players = Player::all();
        return view('players.add', ['players' => $players]);
    }

    public function save(Request $request) {

        $player = new Player;

        if (!Player::exists()) {
            $ranking = 0;
        } else {
        $last_player = Player::orderBy('ranking', 'desc')->first();
        $ranking = $last_player->ranking;
        } 

        $player->name = $request->name;
        $player->family_name = $request->family_name;
        $player->ranking = $ranking + 1;
        $player->email = $request->email;
        $player->height = $request->height;
        $player->playing_hand = $request->playing_hand; 
        $player->backhand_style = $request->backhand_style;
        $player->briefing = $request->briefing;
        $player->picture_route = "images/$request->picture";
        //$player->created_at = $request->playing_hand;
        //$player->updated_at = $request->playing_hand;

        $player->save();
        $players = Player::all();

        //return redirect ('/');


        return view('players.player', [
            'player' => $player,
            'players' => $players
    ]);
        }

        public function edit($id) {
            $players = Player::all();
            $player = Player::find($id);
            return view('players.edit', [
                'player' => $player,
                'players' => $players
        ]);
        }

    public function update(Request $request, $player_id) {

        $player = Player::find($player_id);

        $player->name = $request->name;
        $player->family_name = $request->family_name;
        $player->email = $request->email;
        $player->height = $request->height;
        $player->playing_hand = $request->playing_hand; 
        $player->backhand_style = $request->backhand_style;
        $player->briefing = $request->briefing;
        $player->picture_route = ($request->picture_route == "") ? $player->picture_route : "images/$request->picture_route";

        //$player->created_at = $request->playing_hand;
        //$player->updated_at = $request->playing_hand;

        $player->save();

        $players = Player::all();

        return view('players.player', [
            'player' => $player,
            'players' => $players
        ]);

        //return redirect ('/player/{$player->ranking}');
        }

        public function delete($player_id) {           

            $players = Player::orderBy('ranking', 'asc')->get();
            $player_to_delete = Player::find($player_id);

            $ranking = $player_to_delete->ranking;
            foreach ($players as $player) {
                if ($player->ranking > $ranking) {
                    $player->ranking -= 1;
                    $player->save();
                }
            }

            $player_to_delete->delete();
         
            return redirect ('/');
         
        }

}
