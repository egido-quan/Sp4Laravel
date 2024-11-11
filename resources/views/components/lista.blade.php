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
    <div class="flex w-full py-5  justify-center items-center space-x-16">
        <a href="{{asset('/')}}"><img class="size-16 hover:scale-125" src="{{ asset('images/Titulo.svg') }}"></a>
        <a href="{{asset('/')}}"><h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-green-500 hover:scale-125"> TENNIS CHALLENGE</h1></a>
    </div>
    <section class = "flex m-10 ">
        <div class="bg-gray-300 shadow-2xl h-3/5 w-3/5 p-10 mx-5 overflow-y-auto rounded-2xl">
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
                @foreach ($players as $player)
                    <tr class="">
                        <td class="text-xl font-bold px-2 py-1"><a href="{{asset('/')}}player/{{$player->ranking}}/show">{{$player->ranking}}</a></td>
                        <td class="px-2 py-1"><a href="{{asset('/')}}player/{{$player->ranking}}/show">{{$player->name}}</a></td>
                        <td class="px-2 py-1"><a href="{{asset('/')}}player/{{$player->ranking}}/show">{{$player->family_name}}</a></td>
                        <td class="px-2 py-1"><a href="{{asset('/')}}player/{{$player->ranking}}/show"><img src="{{ asset($player->picture_route) }}" class="h-10 w-10 rounded-lg"></a></td>

                        <td class="px-2 py-1"><a href="{{asset('/')}}challenges/{{$player->id}}/show"><img class="size-7 hover:scale-150" src="{{ asset('images/partido.png') }}"></a></td>
                        <td class="px-2 py-1"><a href="{{asset('/')}}player/{{$player->id}}/edit"><img class="size-5 hover:scale-150" src="{{ asset('images/modificar.png') }}"></a></td>
                        <td class="px-2 py-1"><form action="{{asset('/')}}player/{{$player->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <img class="size-5 hover:scale-150" src="{{ asset('images/borrar.png') }}">
                            </button></form></td>                                
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>