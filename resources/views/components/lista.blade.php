<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <title>Tennis Challenge</title>
</head>
<body class="bg-blue-100">
    <div class="flex w-full pt-5  justify-center items-center space-x-16">
        <a title="home" href="{{asset('/')}}"><img class="size-16 hover:scale-125" src="{{ asset('images/Titulo.svg') }}"></a>
        <a href="{{asset('/')}}"><h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-green-500 hover:scale-125"> TENNIS CHALLENGE</h1></a>
    </div>
    <div class="flex ml-16  w-7/12 px-10 justify-evenly items-center">
        <a href="{{asset('/')}}player/add">
            <button type="button"  title="add player" class="my-10 text-base text-white bg-blue-300 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-3xl px-5 py-2.5 me-2 mb-2">
                Add player
            </button>
        </a>
        <a href="{{asset('/')}}challenges/add">
            <button type="button" title="add challenge" class="my-10 text-base text-white bg-blue-300 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-3xl px-5 py-2.5 me-2 mb-2">
                Add challenge
            </button>
        </a>
        <a href="{{asset('/')}}player/find">
            <button type="button" title="find player" class="my-10 text-base text-white bg-blue-300 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-3xl px-5 py-2.5 me-2 mb-2">
                Search player  
            </button>
        </a>
        <a href="{{asset('/')}}info">
            <button type="button" title="info" class="my-10 text-base text-white bg-blue-300 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-3xl px-5 py-2.5 me-2 mb-2">
                Info
            </button>
        </a>
    </div>

        <section class = "flex mx-10 my-5">
        <div class="bg-gray-300 shadow-2xl h-[550px] w-3/5 p-10 mx-5 overflow-y-auto rounded-2xl">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">  

                    @if (count($players) == 0) 
                    <p class="text-3xl text-center">There are no players added yet</p>                    
                    @endif
                
                <!--<thead class="text-xs text-gray-100 uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3">Ranking</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Apellido</th>
                        <th scope="col" class="px-6 py-3">Ruta de foto</th>
                    </tr>
                </thead>-->
                <tbody>
                @foreach ($players as $player)
                    <tr class="">
                        <td class="text-xl font-bold px-2 py-1"><a title="player info" href="{{asset('/')}}player/{{$player->ranking}}/show">{{$player->ranking}}</a></td>
                        <td class="px-2 py-1"><a title="player info" href="{{asset('/')}}player/{{$player->ranking}}/show">{{$player->name}}</a></td>
                        <td class="px-2 py-1"><a title="player info" href="{{asset('/')}}player/{{$player->ranking}}/show">{{$player->family_name}}</a></td>
                        <td class="px-2 py-1"><a href="{{asset('/')}}player/{{$player->ranking}}/show" ><img title="player info" class="h-10 w-10 hover:scale-125 rounded-lg" src="{{ asset($player->picture_route) }}"></a></td>

                        <td class="px-2 py-1"><a href="{{asset('/')}}challenges/{{$player->id}}/show"><img title="show challenges" class="size-7 hover:scale-150" src="{{ asset('images/partido.png') }}"></a></td>
                        <td class="px-2 py-1"><a href="{{asset('/')}}player/{{$player->id}}/edit" ><img title="edit" class="size-5 hover:scale-150" src="{{ asset('images/modificar.png') }}"></a></td>
                        <td class="px-2 py-1"><form action="{{asset('/')}}player/{{$player->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button title="delete" type="submit">
                                <img class="size-5 hover:scale-150" src="{{ asset('images/borrar.png') }}">
                            </button></form></td>                                
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>