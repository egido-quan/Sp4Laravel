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
        $players = Player::orderBy('ranking')->get();
        return view('players.info', [
            'players' => $players
    ]);
    }

    public function show($ranking) {
        $players = Player::orderBy('ranking')->get();
        $player = Player::where('ranking', $ranking)->first();
        return view('players.player', [
            'player' => $player,
            'players' => $players
    ]);
    }

    public function find() {
        $players = Player::orderBy('ranking')->get();
        return view('players.find', [
            'players' => $players
    ]);
    }

    public function find_results(Request $request) {

        $players = Player::
        where('name', 'like', '%' . $request->name . '%')
        ->where('family_name', 'like', '%' . $request->family_name . '%')
        ->where('email', 'like', '%' . $request->email . '%')
        ->where('height', 'like', '%' . $request->height . '%')
        ->where('playing_hand', 'like', '%' . $request->playing_hand . '%')  
        ->where('backhand_style', 'like', '%' . $request->backhand_style . '%')
        ->where('briefing', 'like', '%' . $request->briefing . '%')
        ->get();
        

        return view('players.index', ['players' => $players]);
        
    }

    public function create() {
        $players = Player::orderBy('ranking')->get();
        return view('players.add', ['players' => $players]);
    }

    public function store(Request $request) {
        $players = Player::orderBy('ranking')->get();
        $player = new Player;

        if (!Player::exists()) {
            $ranking = 0;
        } else {
        $last_player = Player::orderBy('ranking', 'desc')->first();
        $ranking = $last_player->ranking;
        } 

        if (Player::where('email', $request->email)->exists()) {
            $message = "This email is already in use by another player";
            return view('players.addError', [
                'players' => $players,
                'message' => $message
            ]);
        }

        $player->name = $request->name;
        $player->family_name = $request->family_name;
        $player->ranking = $ranking + 1;
        $player->email = $request->email;
        $player->height = $request->height;
        $player->playing_hand = $request->playing_hand; 
        $player->backhand_style = $request->backhand_style;
        $player->briefing = $request->briefing;
        //$picture_path = ($request->picture == "") ? "images/player.png" : "images/$request->picture";
        if (!$request->hasFile('picture')) {
            $picture_path = 'images/' . "player.png";
            $player->picture_route = $picture_path;
        } else {
            $fileName = time() . '.' . $request->picture->extension();
            $picture_path = 'images/' . $fileName;
            $request->picture->move(public_path('images'), $fileName);
            
            $player->picture_route = $picture_path;
        }
        //$player->created_at = $request->playing_hand;
        //$player->updated_at = $request->playing_hand;

        $player->save();
        $players = Player::orderBy('ranking')->get();

        //return redirect ('/');


        return view('players.player', [
            'player' => $player,
            'players' => $players
    ]);
        }

    public function edit($id) {
        $players = Player::orderBy('ranking')->get();
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
        $fileName = time() . '.' . $request->picture->extension();
        $picture_path = 'images/' . $fileName;
        $request->picture->move(public_path('images'), $fileName);
        //$picture_path = ($request->picture == "") ? "images/player.png" : "images/$request->picture";
        $player->picture_route = $picture_path;
        //$player->created_at = $request->playing_hand;
        //$player->updated_at = $request->playing_hand;

        //$player->created_at = $request->playing_hand;
        //$player->updated_at = $request->playing_hand;

        $player->save();

        $players = Player::orderBy('ranking')->get();

        return view('players.player', [
            'player' => $player,
            'players' => $players
        ]);

        //return redirect ('/player/{$player->ranking}');
        }

    public function destroy($player_id) {           

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
