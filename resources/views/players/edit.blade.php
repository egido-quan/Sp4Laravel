
                
      <x-lista :players="$players" />

        <div class="w-2/5 bg-blue-200 shadow-2xl h-auto p-10 mx-5 rounded-2xl flex flex-col items-center">
            <form class="w-full max-w-sm"  id="nuevo" name="nuevo" method="POST"  action="{{asset('/')}}player/{{$player->id}}" enctype="multipart/form-data" autocomplete="off">
                
                @csrf
                @method('PUT')

                <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Name
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" id="name" name="name" value="{{$player->name}}" required>
                </div>
              </div>
            
              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Family_name
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" id="family_name" name="family_name" value="{{$player->family_name}}" required>
                </div>
              </div>
            
              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    e-mail
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="email" id="email" name="email" value="{{$player->email}}" required>
                </div>
              </div>
            
              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Height (cm)
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="number" id="height" name="height" max="300" min="100" value="{{$player->height}}" required>
                </div>
              </div>
            
              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    playing_hand
                  </label>
                </div>
                <div class="md:w-2/3">
                  <select class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="playing_hand" name="playing_hand"  value="{{$player->playing_hand}}" required>
                    <!--<option value="">--Select--</option>-->
                    <option value="{{$player->playing_hand}}">{{$player->playing_hand}}</option>
                    <option value="left">Left</option>
                    <option value="right">Right</option>
                  </select>
                </div>
              </div>

              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    backhand_style
                  </label>
                </div>
                <div class="md:w-2/3">
                  <select class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="backhand_style" name="backhand_style"  value="{{$player->backhand_style}}" required>
                    <!--<option value="">--Select--</option>-->
                    <option value="{{$player->backhand_style}}">{{$player->backhand_style}}</option>
                    <option value="one hand">One hand</option>
                    <option value="two hands">Two hands</option>
                  </select>
                </div>
              </div>

              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    briefing
                  </label>
                </div>
                <div class="md:w-2/3">
                  <textarea class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="briefing" name="briefing" rows="4" cols="10" required> {{$player->briefing}} </textarea>
                  </div>
              </div>

              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    picture
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="file" id="picture" name="picture">
                </div>
              </div>
              
              <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                  <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" id="add" name="add" type="submit">
                    Update
                  </button>
                </div>
              </div>
            
            
            </form>

 
        </div>
        
    </section>
   

</body>
</html>