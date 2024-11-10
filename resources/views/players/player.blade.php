

        <x-lista :players="$players" />

        <div class="w-2/5 bg-blue-200 shadow-2xl h-auto p-10 mx-5  rounded-2xl flex flex-col items-center">
            <h1 class="text-3xl">{{$player->name}} {{$player->family_name}}</h1>
            <img src="{{ asset($player->picture_route) }}" class="rounded-lg size-52">
            <h3>{{$player->ranking}}</h3>
            <p>{{$player->email}}</p>
            <p>{{$player->height}}</p>
            <p>{{$player->playing_hand}}</p>
            <p>{{$player->backhand_style}}</p>
            <p>{{$player->created_at->toFormattedDateString()}}</p>
            <p>{{$player->briefing}}</p>

 
        </div>
        
    </section>
   

</body>
</html>