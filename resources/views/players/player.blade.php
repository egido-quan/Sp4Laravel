

        <x-lista :players="$players" />

        <div class="flex w-2/5 bg-blue-200 shadow-2xl h-auto p-10 mx-5  rounded-2xl flex flex-col items-center">
            <div>
                <p class="text-2xl font-extrabold mb-4 text-center">{{$player->ranking}} {{$player->name}} {{$player->family_name}}</p>
                <img src="{{ asset($player->picture_route) }}" class="rounded-lg w-40 h-60">
            </div>
            <div class="text-xl  mt-10 mb-4 text-center">                
                <p>{{$player->email}}</p>
                <p>{{$player->height}} cm</p>
                <p>{{$player->playing_hand}} handed</p>
                <p>{{$player->backhand_style}} backhand</p>
                <p>registered on {{$player->created_at->toFormattedDateString()}}</p>
                <p class="text-base italic">{{$player->briefing}}</p>
            </div>
        </div>
        
    </section>
   

</body>
</html>