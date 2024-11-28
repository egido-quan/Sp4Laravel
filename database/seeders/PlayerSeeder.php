<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ranking = 1; 

        $player = new Player();

        $player->name = "Jannik";
        $player->family_name = "Sinner";
        $player->ranking = $ranking ++;
        $player->email = $player->name . "@" . $player->family_name;
        $player->height = 183;
        $player->playing_hand = "right";
        $player->backhand_style = "two hands";
        $player->briefing = "I started skiing but changed to tennis";
        $player->picture_route = "images/sinner_full_2024.png";

        $player->save();


        $player = new Player();

        $player->name = "Daniil";
        $player->family_name = "Medvedev";
        $player->ranking = $ranking ++;
        $player->email = $player->name . "@" . $player->family_name;
        $player->height = 185;
        $player->playing_hand = "right";
        $player->backhand_style = "two hands";
        $player->briefing = "I have my own style";
        $player->picture_route = "images/medvedev_full_2024.png";

        $player->save();


        $player = new Player();

        $player->name = "Novak";
        $player->family_name = "Djokovic";
        $player->ranking = $ranking ++;
        $player->email = $player->name . "@" . $player->family_name;
        $player->height = 180;
        $player->playing_hand = "right";
        $player->backhand_style = "two hands";
        $player->briefing = "Idemo !";
        $player->picture_route = "images/djokovic_full_2024.png";

        $player->save();

        $player = new Player();

        $player->name = "Andrei";
        $player->family_name = "Rublev";
        $player->ranking = $ranking ++;
        $player->email = $player->name . "@" . $player->family_name;
        $player->height = 179;
        $player->playing_hand = "right";
        $player->backhand_style = "two hands";
        $player->briefing = "I am a nice guy, but terrible on the court";
        $player->picture_route = "images/rublev_full_2024.png";

        $player->save();

        $player = new Player();

        $player->name = "Alexander";
        $player->family_name = "Zverev";
        $player->ranking = $ranking ++;
        $player->email = $player->name . "@" . $player->family_name;
        $player->height = 194;
        $player->playing_hand = "right";
        $player->backhand_style = "two hands";
        $player->briefing = "I like jewlery";
        $player->picture_route = "images/zverev_full_2024.png";

        $player->save();


        $player = new Player();

        $player->name = "Jack";
        $player->family_name = "Draper";
        $player->ranking = $ranking ++;
        $player->email = $player->name . "@" . $player->family_name;
        $player->height = 186;
        $player->playing_hand = "left";
        $player->backhand_style = "two hands";
        $player->briefing = "I am Aussie";
        $player->picture_route = "images/draper_full_2023.png";

        $player->save();

        
        $player = new Player();

        $player->name = "Lorenzo";
        $player->family_name = "Musetti";
        $player->ranking = $ranking ++;
        $player->email = $player->name . "@" . $player->family_name;
        $player->height = 178;
        $player->playing_hand = "right";
        $player->backhand_style = "one hand";
        $player->briefing = "Forza Italia";
        $player->picture_route = "images/musetti_full_2024.png";

        $player->save();


    }
}
