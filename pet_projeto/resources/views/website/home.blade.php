@extends('website.index')
@section('conteudo')



  <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center pl-6 p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-orange-450 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
  </button>

  <aside id="separator-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-orange-400 text-white font-semibold text-xl">

    @if(Auth::check())


        <form action="/deslogar/usuario" class="px-3 py-4 " method="POST">
          {!! csrf_field() !!}
            <button type="submit" class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg text-white bg-red-700 hover:bg-red-770 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center focus:px-4 focus:py-2 ">
            <div class="flex justify-items-center">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABhklEQVR4nLXUv0tWURzH8Uu/LBAiCNFSIoNya+gfaNMlIUQUW1zaMyIHF8ElwiGCEgmhocFcLMJBQ4ImEaFJ3IKQtCklaAjTlxw4ol19fM5zn6cPfOFy7vd+3vec7/d7sixBOIEruIHTWa2EkxjEmn39wgtcqIX5O6W1govVAB4eY76nt9UAviYAdtBcxLxBujqLABorANwtAghtuZ4IaK0YECEjCeZzhcwj4BwWjjH/gauFARFSj5f4k+ucmTDZVZnnQOdxG+24FIfwAT5hCYuYwOVaAYfibj5jCtPYxMdKTE6hDV14FO+kO/HdMj7k8ptwvZzpGfRiEhtHFHYs5q3vPee+7wjHWOpvH+N7mbYcKwMIdfiLviI9fwgQu2wYT2I8x1aE7E84ZhUDXMMqfh6I7Zg7ehAwVwSQHT6i/jgn70M9/wfgGd78Y14h4FXM/xYKmqUKTxMB8zE/DFc47/voRk9ce10KcBYDGC8T4V4Ks9KCLzn4b9xL3lXizltxCzdRd1TSLlKxRVd6vFcDAAAAAElFTkSuQmCC">
            Logout</div>
          </button>
        </form>

        <ul class="space-y-2 ">

          <li class="p-4 space-y-2  hover:bg-orange-500 border-b border-gray-200">
            <a href="/usuario/{{Auth::user()->username}}">
              <div class="flex items-center gap-4">
                  <img class="w-12 h-12 rounded-full" src="{{Auth::user()->getImagem()}}" alt="">
                  <div class="">
                      <div>{{Auth::user()->username}}</div>
                      <div class="text-sm truncate w-40 ">{{Auth::user()->email}}</div>
                  </div>
              </div>
            </a>

            
          </li>

          @foreach (Auth::user()->pets as $valor) 

            <li class="p-4 space-y-2  hover:bg-orange-500">
              <a href="/pet/{{$valor->id}}">
                <div class="flex items-center gap-4">
                  @foreach ($valor->imagemPet as $valor2)
                      <img class="w-10 h-10 rounded-full" src="{{$valor2->getImagem()}}" alt="">
                  @endforeach
                    <div class="">
                      <div>{{$valor->nome}}</div>
                    <div class="text-sm truncate w-40 ">{{$valor->descricao}}</div>
                </div>
              </div>
              </a>
            </li>

          @endforeach

        </ul>

    @else


      <a href="/login"> 

        <div class="flex flex-col items-center pt-2 pb-4 border-b border-gray-50">
                
          <img class="w-16 h-16 mb-3  rounded-full shadow-lg" src="/img/user.png"/>
          <a href="/login" class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm sm:w-auto px-2.5 py-2.5 text-center">
            <div class=" text-xl font-bold flex justify-center">
              Login
            </div>
          </a>
              
        </div>

      </a>
        
    @endif
    </div>
  </aside>

  <div class=" sm:pl-72 flex justify-center py-4 px-6">

    <div class=" w-full p-4 border text-lg text-white font-semibold rounded-lg shadow-xl bg-gray-200 border-gray-200">

    
    <form id="pesquisa" action="/pesquisar" autocomplete="off" method='POST' >   
      <div class="p-2 flex items-start w-full md:w-4/5 lg:w-3/5 ">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
    
            <input type="text" value="{{ isset($pesquisa) ? $pesquisa : '' }}" name="pesquisa" id="simple-search" class="bg-orange-50 border border-orange-300 text-gray-900 text-xl rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full  p-2.5 " placeholder="Pesquise por cidade, adjetivos, animais..." />
        </div>

        {!! csrf_field() !!}

        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-orange-700 rounded-lg border border-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 ">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>
      </div>
      
      <div class="p-4 rounded-lg bg-blue-200  md:w-4/5 lg:w-3/5 ">

        <div class="flex gap-6 justify-start">
        
          <div class="grid">

            <label for="" class="text-2xl text-blue-900 pb-2">Tamanho</label>

            <div class="flex items-center">
                <input id="default-radio-1" type="radio" value="1" name="tamanho" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                <label for="default-radio-1" class="ms-2 text-lg font-medium text-blue-900">Filhote</label>
            </div>
            <div class="flex items-center">
                <input  id="default-radio-2" type="radio" value="2" name="tamanho" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                <label for="default-radio-2" class="ms-2 text-lg font-medium text-blue-900">Pequeno</label>
            </div>

            <div class="flex items-center">
                <input  id="default-radio-3" type="radio" value="3" name="tamanho" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                <label for="default-radio-3" class="ms-2 text-lg font-medium text-blue-900">Médio</label>
            </div>

            <div class="flex items-center">
                <input  id="default-radio-4" type="radio" value="4" name="tamanho" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                <label for="default-radio-4" class="ms-2 text-lg font-medium text-blue-900">Grande</label>
            </div>

          </div>

          <div class="grid">

            <label for="" class="text-2xl text-blue-900 pb-2">Tipo</label>

            <div class="flex items-center">
                <input id="default-radio-1" type="radio" value="1" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                <label for="default-radio-1" class="ms-2 text-lg font-medium text-blue-900">Canino</label>
            </div>
            <div class="flex items-center">
                <input  id="default-radio-2" type="radio" value="2" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                <label for="default-radio-2" class="ms-2 text-lg font-medium text-blue-900">Felino</label>
            </div>

            <div class="flex items-center">
                <input  id="default-radio-3" type="radio" value="3" name="tipo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                <label for="default-radio-3" class="ms-2 text-lg font-medium text-blue-900">Aves</label>
            </div>

          </div>

        </div>

        <div class="flex justify-end">

        {!! csrf_field() !!}

          <button class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm sm:w-auto px-2.5 py-2.5 text-center">
            <div class=" text-xl font-bold flex justify-center">
              Filtrar
            </div>
          </button>

        </div>
      </div>

    </form>

    <br>

    <div class="border-b border-orange-700"></div>



    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 py-4">

      @foreach ($pets as $pet) 

        <a href="/pet/{{$pet->id}}" class="transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-105 duration-200 hover:shadow-xl px-4 py-6 block max-w-sm border border-orange-700 rounded-lg shadow-lg bg-gray-50  ">

            @foreach ($pet->imagemPet as $imagem)
                <img class=" sm:h-64 w-full rounded-lg border-b-2 border-orange-700" src="{{$imagem->getImagem()}}" >
            @endforeach

            <div class="py-2 h-12 flex truncate gap-2">

              @foreach($pet->adjetivos as $adjetivo) 

                <div id="div_adjetivo_excluir" class="">   
                    <label for="default-search" class="py-2 text-base font-medium text-green-900 sr-only text-white">Search</label>
                    <div class="relative truncate">

                      <div class=" block w-full text-sm text-green-900 border border-green-300 rounded-lg bg-green-600 focus:ring-green-500 focus:border-green-600 text-white focus:ring-green-600 focus:border-green-600">
                        <p id="default-search" class="py-1.5 px-2" >{{ucfirst($adjetivo->texto)}}</p>
                      </div>                  
                    </div>
                </div>
                          
              @endforeach

            </div>
            <h5 class="py-2 pt-2 text-2xl font-bold tracking-tight text-orange-700 text-elipsis overflow-hidden sm:h-16 md:h-14 lg:h-12 xl:h-12 h-14 "> {{ucfirst($pet->nome)}} </h5>
            <p class="font-normal text-justify text-gray-800 overflow-hidden text-pretty text-elipsis h-28">{{ucfirst($pet->descricao)}}</p>

            <div class="flex  justify-between pt-2 pr-2">

              <div class=" pt-4 ">
                <p class="font-normal text-lg text-gray-800 overflow-hidden text-elipsis">{{ucfirst($pet->usuario->endereco->cidade)}}, {{$pet->usuario->endereco->uf}}</p>
              </div>

              <div class=" ">

                  <button class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm sm:w-auto px-2.5 py-2.5 text-center">
                      <div class=" text-xl font-bold flex justify-center truncate">
                          + Detalhes
                      </div>
                  </button>
              </div>
            </div>

        </a>

      @endforeach

    </div>

    <div class="py-4 flex justify-center">

    {{$pets->onEachSide(1)->links('website.pagination')}}

    </div>

    </div>

  </div>


@endsection