

<x-lista :players="$players" />

<div class="w-2/5 bg-blue-200 shadow-2xl h-auto p-10 mx-5  rounded-2xl flex flex-col items-center overflow-y-auto">

<table class="w-full text-sm text-left rtl:text-right text-gray-500">
    <!--<thead class="text-xs text-gray-100 uppercase bg-gray-800">
        <tr>
            <th scope="col" class="px-6 py-3">Ranking</th>
            <th scope="col" class="px-6 py-3">Nombre</th>
            <th scope="col" class="px-6 py-3">Apellido</th>
            <th scope="col" class="px-6 py-3">Ruta de foto</th>
        </tr>
    </thead>-->
    <tbody>
        @if (count($challenges) == 0) 
        <p class="text-2xl text-center">There are no challenges added to this player yet</p>                    
        @endif
    @foreach ($challenges as $challenge)
        <tr class="">
            <td class="px-1 py-1">{{$challenge[10]}}</td>
            @if ($challenge[1] == "")
                @php
                    $challenge[0] = "Deleted";
                    $challenge[1] = "player";
                @endphp
            @endif
            <td class="px-1 py-1">{{$challenge[0]}}</td>
            <td class="px-1 py-1"> {{$challenge[1]}}</td>
            <td class="px-1 py-1"> {{$challenge[4]}} - {{$challenge[7]}}</td>
            <td class="px-1 py-1"> {{$challenge[5]}} - {{$challenge[8]}}</td>
            <td class="px-1 py-1"> {{$challenge[6]}} - {{$challenge[9]}}</td>
            @if ($challenge[3] == "")
                @php
                    $challenge[2] = "Deleted";
                    $challenge[3] = "player";
                @endphp
            @endif
            <td class="px-1 py-1">{{$challenge[2]}}</td>
            <td class="px-1 py-1"> {{$challenge[3]}}</td>

        </tr>
    @endforeach
    </tbody>
</table>  
</div>
</section>
</body>
</html>