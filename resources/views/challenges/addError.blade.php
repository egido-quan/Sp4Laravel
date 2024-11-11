

        
      <x-lista :players="$players" />

        <div class="w-2/5 bg-blue-200 shadow-2xl h-auto p-10 mx-5 rounded-2xl flex flex-col items-center">
          <p class = "text-red-400 font-bold">{{$message}}</p>
            <form class="w-full max-w-sm"  id="nuevo" name="nuevo" method="POST"  action="{{asset('/')}}challenges/save" autocomplete="off">
                @csrf
                <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Player 1
                    ranking
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input list="players" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  id="player1_ranking" name="player1_ranking" required>
                  <datalist id="players">
                    @foreach($players as $player)
                      <option value="{{$player->ranking}} ">{{$player->name}} {{$player->family_name}}</option>
                    @endforeach
                  </datalist>
                </div>
              </div>
            
              <div class="ml-24 md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                   
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                  type="number" id="p1_set1" name="p1_set1" max="7" min="0" required>
                </div>
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                  type="number" id="p1_set2" name="p1_set2" max="7" min="0" required>
                </div>
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                  type="number" id="p1_set3" name="p1_set3" max="7" min="0">
                </div>
              </div>

              <div class="ml-20 md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <p class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Set1
                  </p>
                </div>                
                <div class="md:w-1/3">
                  <p class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Set2
                  </p>
                </div>
                <div class="md:w-1/3">
                  <p class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Set3
                  </p>
                </div>
              </div>

              
            
              <div class="ml-24 md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                   type="number" id="p2_set1" name="p2_set1" max="7" min="0" required>
                </div>
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                  type="number" id="p2_set2" name="p2_set2" max="7" min="0"" required>
                </div>
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                  type="number" id="p2_set3" name="p2_set3" max="7" min="0">
                </div>
              </div>
            
              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Player 2
                    ranking
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input list="players" class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  id="player2_ranking" name="player2_ranking" required>
                  <datalist id="players">
                    @foreach($players as $player)
                      <option value="{{$player->ranking}} {{$player->name}} {{$player->family_name}}"></option>
                    @endforeach
                  </datalist>
                </div>
              </div>
            
              
              
              <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                  <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" id="add" name="add" type="submit">
                    Add
                  </button>
                </div>
              </div>
            
            
            </form>

 
        </div>
        
    </section>
   

</body>
</html>