

        <x-lista :players="$players" />

        <div class="w-2/5 h-96  mx-5  rounded-2xl flex flex-col items-center">
            <a href="{{asset('/')}}player/create">
                <button type="button"  title="add player" class="my-10 text-4xl text-white bg-blue-300 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-3xl px-5 py-2.5 me-2 mb-2">
                    +<img src="{{ asset('images/tenista2.png') }}"  width="40"> 
                </button>
            </a>
            <a href="{{asset('/')}}challenges/add">
                <button type="button" title="add challenge" class="my-10 text-4xl text-white bg-blue-300 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-3xl px-5 py-2.5 me-2 mb-2">
                    +<img src="{{ asset('images/partido.png') }}"  width="40"> 
                </button>
            </a>
            <a href="{{asset('/')}}player/find">
                <button type="button" title="find player" class="my-10 text-white bg-blue-300 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-3xl px-5 py-2.5 me-2 mb-2">
                    <img src="{{ asset('images/lupa.png') }}" width="40">    
                </button>
            </a>
            <a href="{{asset('/')}}info">
                <button type="button" title="info" class="my-10 text-white bg-blue-300 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-3xl px-5 py-2.5 me-2 mb-2">
                    <img src="{{ asset('images/normativa.png') }}" width="40">    
                </button>
            </a>
        </div>
    </section>
   

</body>
</html>