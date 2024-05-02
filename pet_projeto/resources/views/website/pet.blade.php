@extends('website.index')
@section('conteudo')

    <div class="justify-items-end pl-20">

    @if(count($errors))
                            
                            <div id="alert-2" class="flex z-40 absolute items-center p-4 gap-2 text-red-800 rounded-lg bg-red-50 shadow-xl" role="alert">
                
                                <div class="ms-3 text-xl font-medium">
                                    @foreach($errors->all() as $error)
                
                                        <li>{{ $error }}</li>
                
                                    @endforeach
                                </div>
                                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                                            
                
                        @endif


        @if(session()->has('successMessage'))

            <div id="alert-3" class="flex z-40 absolute items-center p-4 mb-4 gap-2 text-green-800 rounded-lg bg-green-50 shadow-xl " role="alert">
                
                <div class="ms-3 text-xl font-medium">
                    <span class="font-medium">{{ session()->get('successMessage') }}</span>
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>

        @endif

    </div>



    <div class=" flex justify-center gap-2  py-4 px-6">

            <div class="w-full xl:w-3/5 border text-lg text-white font-semibold rounded-lg shadow-xl bg-gray-200 border-gray-200">

                        <div class="flex justify-start py-4 px-6">

                            @if(Auth::check() and Auth::user()->id == $pet->usuario->id)

                                    <button id="dropdownButton" data-dropdown-toggle="dropdown"  data-dropdown-placement="right" class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm sm:w-auto px-2.5 py-2.5 text-center" type="button">
                                        <img class="w-6 h-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABDElEQVR4nOWVT44BURDGmzUtuAUHEDcwO4mwxAlcBltm6Uh2kxCJA2DHTyqpBO1VpZk3k0nmSzp56ff96VTVe50k/wLAB3DgBll3YgZ88oxlLPMm8BUIkHeNV82KwAxYAQNgDlywcVHOQDWiLXoBY76PkWVeAnYRAvZAGgqYOKIN0APK+nSBtcOfhALawNEwrwX4Vd3LQjzaVplawCkj6Dk962e4om2ZTVbR/YESlB1uyiMOrvkbAZWXAowSdR2+zH++EjlNXktDA/w6sM3d5Bxj2teap/rlIXN3TH/2oAnkmEcIGCYWgELmspsBZ8dM9qZavpWuC2aAEdqIdl07IctAwCKKefIbv8w/jSs32vccvJSpxQAAAABJRU5ErkJggg==">
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdown" class="z-10 hidden text-base list-none bg-blue-900 divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                        <ul class="py-2 text-gray-100" aria-labelledby="dropdownRightButton">
                                        <li>
                                            <a role="button" data-modal-target="editar-modal" data-modal-toggle="editar-modal"  class="block px-4 py-2 text-sm hover:bg-blue-800 ">Editar </a>
                                        </li>
                                        <li>
                                            <a role="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block px-4 py-2 text-sm text-red-600 hover:bg-blue-800 ">Excluir</a>
                                        </li>
                                        </ul>
                                    </div>

                            @endif
                            

                        </div>

                <div class="flex grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 gap-3 justify-start px-4 py-6">

                    <div>

                        <div id="indicators-carousel" class="relative w-full" data-carousel="static">

                            


                            <!-- Carousel wrapper -->
                            <div class="relative h-56 md:h-96 lg:max-h-screen overflow-hidden bg-orange-900 rounded-lg ">
                                <!-- Item 1 -->
                                @foreach($pet->imagensPets as $valor)
                                    <div class=" ">
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                            <img src="{{$valor->getImagem()}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                            <!-- Slider indicators -->
                            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                @foreach($pet->imagensPets as $valor )
                                    <button type="button" class="w-3 h-3 rounded-full text-white bg-white/50" aria-current="true" aria-label="Slide_{{$valor->id}}" data-carousel-slide-to="{{$valor->id}}"></button>
                                @endforeach
                            </div>
                            <!-- Slider controls -->
                            @if($pet->imagensPets->count() > 1)
                                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 bg-gray-800/30 group-hover:bg-white/50 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 bg-gray-800/30 group-hover:bg-white/50 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            @endif
                        </div>

                        <div class="pt-2 flex justify-center">
                            
                            <a class="flex place-content-center" target="_blank" rel="noopener noreferrer" href="https://www.google.com/maps/place/{{$pet->usuario->endereco->bairro}},{{$pet->usuario->endereco->cidade}},{{$pet->usuario->endereco->uf}}">
                                <img class=" h-10 w-10"src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAABCCAYAAADjVADoAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEBUlEQVR4nO2aS4hcVRCGK2g0ZtJdp7uNYcYIPhPdCEFFQQVRNz7QhRkEM91Vtyc0GIkYfC2CCIJZxcdCN4JCFrpy4VtQ0YCCD0ZBjDD03Ko7PckQ0Kj4wMREM3ImTtTQM33unbl9H3M/ONCrOrf/c85f51EABQUFBQUF6YaCVaYhlxvWO40nI8jStL+xHmyC4X1nQJ6pbm2vR9JHkPRjw/qHYZ3p2kiPGpYPkYIHSvUDNcgLpaZuRNKXDemxef/8PA1ZDiPrc7VmZwgyS2tsJZI+ueDouwpC+kvFk3sBZlZAljh7y+Qgsny6WAG6tFfXbtu3BrIAjkxeYEgkBhHm2ud4T6cCaWZgxD/HkE7EKMI/hiqf2cwDqWR45jTr9rGL8K+R7oE0gqwP9UuEk2J4shnSRK3ZGULSX0OO6OHZ/QLLntlGsteQHgkZ48Bga3o1pAXDutt9fet3hnR7N/evbmmX0ZMdhuWQsxikD0MaWD88dRay/uwowhc2tbrsQg3Jl25CyKT1J0iaMuvdjk4/HibtlUenqq4ZCMm/CZLGkL7U+2PleMnTq8PGrnhyneOseBaSxpCMO5jaO9Hj63suSw4SpTW28sRpsacQzahdIGnLJQMleg6pNTtDLlO33PSvjNpHlYJrXPpY47XXQlKU2L/ESYhG+6LIfdRlQ9x99G1GlCIY5RwV8q91MkyvcyEkeuXGDqmTZVvULgzp/S5Zad3IwYGl/XMhMaTfO6S3vRARZP3EwSwPQtIg6ZtxbXoqjeAWp9gs70LSIOujbkLofpft9RzVxtS5SDLtFlsehKQpj05cbNeok1eQjNtM0ytmtR5cZkjbjv5z3F4QQxowrB+4ffTsNP4NWZ6wI35qnApPnIeku5Dld9d4tm9ICxX2bw3x4SdHEkm/sR6DrG8hybfOM+s/rUJyG6QJJH07vBiLbKTvQ9oo1WXDiVunvolwpEbBpZBGDMnO/gkhOyG1PP7R6Yblq7hFQNav7ckX0kyZ5SrD8meMS+IYkn8FZAFD+lRss4F0F2SFwdb0asPqx+AL4+l94ZoH48ntS+8N/o2QRUyIHWfvJSGvQVbBerDJkPy1BAZ51O5TIMsg6StLIMTTkHWQgvPDvmn+v8mPuamlMizPRPYGT3ZAXhgYlXXRziFyKDOlQq4Y0hcjeMNjkDdKTd0YJoPYC5zceMOp2AuYEDNiN+QVpOAG131Dt6u8XGFYx3rvIvUNyDuG5L7eQshdkHfKthJmwaJ0+QG2t8+E5QCyvL7Asngelgvoyeb5hLD1ELBsIPuKLj91mQ37M1eBv1gMywupLArrN+jJzV3OFtfD8mNmxWzZcZqe9hOtymvoHfZ+076JJPchBQUFBQUFEIK/AdmgEWmA8UMlAAAAAElFTkSuQmCC">
                                <p class="text-2xl place-content-center text-blue-600">{{$pet->usuario->endereco->bairro}}, {{$pet->usuario->endereco->cidade}}, {{$pet->usuario->endereco->uf}}.</p>
                            </a>
                        </div>

                    </div>
                    <div>

                        @if(Auth::check() and Auth::user()->id == $pet->usuario->id)

                        
                            
                            <div class=" ">
                                <div class=" py-2 h-12">
                                    <div id="refreshable" class="flex gap-1">

                                            <form id="form_adjetivo_cadastro" class="max-w-36" action="/cadastrar/adjetivo" autocomplete="off" method="post">   
                                                <div class="relative">

                                                    <input type="hidden" name="idPets" value="{{$pet->id}}">
                                                    <input type="search" maxlength="15" name="texto" id="default-search" class="pe-10 w-28 text-sm text-green-900 border border-green-300 rounded-lg bg-green-600 focus:ring-green-500 focus:border-green-600 text-white focus:ring-green-600 focus:border-green-600" placeholder="Fofo"/>
                                                    
                                                    {!! csrf_field() !!}
                                                    
                                                    <button type="submit" class="text-white absolute end-2 bottom-1 bg-green-600 hover:bg-green-800  font-medium rounded-lg text-sm  ">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABXUlEQVR4nO2WvUrDUBSAs/gIDv5UBBeHOukoOAsqgm9hbX0FX6FjUTp0dK/6JkYKrqKbjZstnxw4hTvk/kd06AeBJDe5H/fknHNTFEv+G8AW0AWegBL40qPUe1dAq0nhBjAAZviZA/fAdq70HKiIZwqcpUqvdQWpyLu9lJXOM6SmPGzlwGZieF1hXw8RD2me25CSCcneWGYSSZdY6jSHd2AfOKwZ67jEj5nSts5zUDM+doknidIPYE/n2AXeap4pXeLql6RC5RJL6tdxobUtvdkW3rZe25i6xC+Wl3Z0/MiQx0i9obYl12RRDip/jZR6k0u2NgLkK5FS4dIlbnkaiCmPkX47G4hOeOeZRMJ8o9kcysApNTZ+W3an8AmsecUqP26oZ8u2eBokNeS9Bn4EulHSBbKJJ4ZdwntS5ACsAn3NzJBVjoK/acSfSQd4AJ61r1d6PpY69ZbMkuIP+AFd7iP6smOiuQAAAABJRU5ErkJggg==">
                                                    </button>
                                                </div>
                                            </form>

                                            <div class="w-48 sm:w-full flex gap-1 overflow-x-scroll">
                                                @foreach($pet->adjetivos as $adjetivo) 

                                                    <form id="form_adjetivo_excluir" class="max-w-36" action="/excluir/adjetivo" autocomplete="off" method="post">   
                                                        
                                                        <div class="relative">

                                                            

                                                            <input type="hidden" name="id" value="{{$adjetivo->id}}">
                                                            <input disabled type="search" class="hidden" maxlength="15" name="texto" value="{{$adjetivo->texto}}" id="default-search" placeholder="Fofo"/>

                                                            <div class=" block w-full text-sm text-green-900 border border-green-300 rounded-lg bg-green-600 focus:ring-green-500 focus:border-green-600 text-white focus:ring-green-600 focus:border-green-600">
                                                                <div class="flex gap-2 justify-center">
                                                                    <p id="default-search" class="py-2 px-2.5 pe-8" >{{ucfirst($adjetivo->texto)}}</p>
                                                                    {!! csrf_field() !!}
                                                                    <button type="submit" class="text-white absolute end-2 bottom-1 bg-green-600 hover:bg-green-800  font-medium rounded-lg text-sm  ">
                                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABBklEQVR4nN2VTQrCQAxGBbFncVFXulMP4U/xTuotlHokFXVbsTvR/ZPAFCWknVoV0QcDQzL9EpKZtFb7a4AAmAArYANc3ZJ97HxBVfExcMCPnBk+I1wH5jzPTL4tE6CKeMbMJz7idYZFDdU17wId4GQIia0N9JR9bzbe3QhN2/lCFUT2ofNJAprICiBXUZMCLedvAolhOxrfLa0AW+OgzjZUe6t0wsYKcCGfNMvak3nG5R0BkoLz56+UKC7KnHtZrMZrFl+5poHx0Hqehya+vrLvciesPHNeZ2CKv2nYTQvFH8a1jN7PjGtVrn0J4Z23LHm4xkcyW4C1e4yyZC82+es1Kon/DDdik9w/6UChUgAAAABJRU5ErkJggg==">
                                                                    </button>
                                                                </div>
                                                            </div>
                                                                  
                                                        </div>
                                                    </form>

                                                @endforeach
                                            </div>
                                    </div>
                                </div>
                            </div>    
                        @else
                        
                            
                            <div class=" py-2 h-12 ">
                                    
                                <div id="refreshable" class="flex gap-1">
                                    <div class="w-80 sm:w-full flex gap-1 overflow-x-scroll">
                                        @foreach($pet->adjetivos as $adjetivo) 

                                            <div id="div_adjetivo_excluir" class="">   
                                                        
                                                <div class="relative">

                                                    <input type="hidden" name="id" value="{{$adjetivo->id}}">
                                                    <div disabled type="search" maxlength="15" name="texto" class=" text-sm text-green-900 border border-green-300 rounded-lg bg-green-600 focus:ring-green-500 focus:border-green-600 text-white focus:ring-green-600 focus:border-green-600"> {{ucfirst($adjetivo->texto)}} </div>
                                                            
                                                </div>
                                            </div>
                                                
                                        @endforeach
                                    </div>
                                </div>
                                
                            </div>
                            

                        @endif

                            
                        <div class="py-2">
                            <div class="py-2 border-t border-orange-700">

                                <p class=" text-orange-900 text-4xl  font-bold ">{{ucfirst($pet->nome)}}</p>

                                <p class=" text-pretty text-gray-700 text-2xl text-justify font-semibold ">{{ucfirst($pet->descricao)}}</p>

                            </div>
                        </div>

                        <div class="py-2">
                            <div class="py-2 border-t border-orange-700">

                                <p class=" text-orange-900 text-3xl  font-bold "> Características </p>

                                @if($pet->peso)

                                    <p class=" text-gray-700 text-2xl  font-semibold ">Peso: {{$pet->peso}}kg</p>

                                @endif

                                @if($pet->tamanho)
                                    <p class=" text-gray-700 text-2xl  font-semibold ">
                                        Tamanho: @switch($pet->tamanho)
                                                    @case(1)
                                                        <span>filhote</span>
                                                        @break

                                                    @case(2)
                                                        <span>pequeno</span>
                                                        @break

                                                    @case(3)
                                                        <span>médio</span>
                                                        @break

                                                    @case(4)
                                                        <span>grande</span>
                                                        @break
                                                    @default
                                                    @break

                                                @endswitch
                                    </p>
                                @endif

                            </div>
                        </div>

                        <div class="py-2">
                            <div class=" py-2 border-t border-orange-700">

                                <p class=" text-orange-900 text-3xl  font-bold "> Contato </p>

                                <div class="grid gap-1 sm:grid-cols-2  p-2">
                                    

                                    <div class="text-gray-900">
                                        <a href="/usuario/{{$pet->usuario->username}}">
                                        <div class="flex items-center gap-4">
                                            <img class="w-14 h-14 rounded-full" src="{{$pet->usuario->getImagem()}}" alt="">
                                            <div class="">
                                                <div class="text-lg truncate w-28 ">{{$pet->usuario->username}}</div>
                                                <div class="text-lg truncate w-28 ">{{$pet->usuario->email}}</div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>


                                
                                    <div class=" flex w-full">
                                        @if($pet->usuario->contato->whatzap !== null)

                                            <a href="{{$pet->usuario->contato->whatzap}}">
                                                <img class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAHKUlEQVR4nO1ZeWwUZRRfPKIx8T4SNWr806gx0T+M/lWvaIwaQUIQr6hBRFQ8IMjlhaggCgohiuCBNx6J0KC0YsEWtHa7c3R3Z75v5pvZbo89elJ2d/Z+5k3odqa77R4dNCZ9yZdsZmfee7/vnd/7XK5pmqZpmjIBwAk8Idd7CFvRoWgNAtWCPFHjnKxmceFvfCZSbT8nqas8knLjLoATXf81cYRczFO2nidswMcCsa5wNDM0chQSyRRksznI5/Pmwt/4bGgkBl3hvqyfdcYEwoZ4wja5vezSf11xrzd4jkC0HTxRDVTaSKagWjJSaeiO9GUFwgyBsp0eSs//V5TnZGUOT9gRVDyTzcJUKZvLoVUyPGFHOYk9cNwUb2pqOkkg2navqifiRrKkMr1GGPaGf4NN6jZY5l0DTwvLYZGw3Py9Uf0I9oQaoNvoLfltIpkEn6on0Bput/tkZ5XX9VMFojUowR4Dd8xKecjDb9E/YCG/DOqaZ1a0nuCWQH2oEdK5tI1XLpcD1tWbFCk76Hb3nObkzjdo3aEUBqSV3EMCzOderFjx8Wtu2wJo6W+1b0g+D4GecEog7IAjluCp9jHuvFX5HORhm/5FzYqPXxuUrZCyWANloSXQnaakvEdis72qHre6jZE1YIXvTceUrzu2nhNXQzwbt7mTVw0YNQe2KHaeLRA2bA1Y3PmV/rccV77u2FosrrJZAgObJ2zELcvnVQ+Asm3BUDRj9U8n3WYyd7ISpliBss+rUt7tD1yIRcqa51sHPUXCbm65Dz7r/BakEQp/9P8Fdx6e5wiIFktgYxXHYtehKJdUDECQ1TexUI0yyeSz8EDbU0WCdnXvtu3Wh/rnjgCY27bAlmKxYvOEbaxIeQCYIRAtir3LKO2LNBUJedC9yKwB4wvZTc2zHAFRH2q0tR3YO1XUAAp+5VqfGohZFVvEv1QkAOOhFGHVdQLAAm6Jja+fBWLtfuWGsgA4SV0aDEcL9osk+0ru6u7QvpIADg387VhA9xphWzBzkrKyLIAOqtUPHjla+PDXyO8lmX8Z/KEkgIN9hx0DUG9xI2zTRUVrLAtApBqz5v4tbEdJ5q9I64uUH0gNwZy/5zsG4H314wJvjEmBskD5GCBsOJ0ZS58TFa7bDs2B4fQRG4A18nuOKV/XPBNe8r1R4I0pXSAsVj4GZJbEMj5KWOInEvAB217U3DmVheqaZ8Izwgpbf8TJaqYsAF5WbS3zix2vTCgAC5l0VLGBwL7fKQDPCisLfHOVAhAo60+lxzqIV6UNkwp52P202eAVTJ3PwFLva44AWO5ba3MhPLWVB6BoqjWIt2qflhW02r/OVtSwIZsoHtBCX3X9CLNbHy/LdzPbYQniJIiU6WUBiIr2ff/wWHA29bVUtFvbA18VZSU8Qt7950OFd16V3ikAxVZhT6gB5rUtnJDnL+H9BV6Y2kWq/1oWgEdSFwdDkUIh608NVByYpWpDLBM3d3wt2WRztTHfzpln6PG8UCYW0VHC3oyT1WVlAfB+9aoORR87WQDAC5MEcikXyearm1b82FNfxAcHAlbyqXqsXVKvKwvAdCPKuq1xsD/aXFXwPckthUA8WDGA1+V3i3g0RA7Y/F+gDM0xoyIAPGVrOi1uhCexxz3PVwXi1pbZsI5uga5Ez6TKtw3xcEvL7KLMZrViMBzNCIS95apm8sYTNWFNpyio1nSII5cfevaYVhkNYoytbfoXJtDxvo8FcZQyGUyfaqJdki6qGMAxK3wdHhgqMAoZEUdy+x2H74e7/nxwwv8/CXxtsxB6gkC0ra5qSaQ6PxIbi2Vsn50AMNla5X/bdNdRiiUM8yDjZuzMqpSXJOl0jrBULjfGDLvP46n8av86W5rFdqZD0ROcrNxb9e63S8o9NNAVs+Zqa0Fyct3UPAs+0nfadh4bNxrsNniibXHVQjjEDfcPFjj6RkhB4O2H5sKSjtfgm66foDF6EB5tX1yz8o+0PwOeIdHm86g8jjFFyvbWfAkiUNZrPdTjKQuDix/2Fg9kIW+2G8+Lqyuq2PjOs+JKcyCcy9sHxThCoZ3dBipPKT2lJuV5Wb5cpCwBNVB/ahB+72sxxyvY92AFx4XBiU3hvsgB851SFEsYps+LVNsypesnTlIXBHrCpS8ALGZGgdaTW62UzmShszeS5gkbxNhzTZVEhe0bPDJSJAivkaKDw6AEe+O8zHByrOPhp7M3kprowmMywm+CoWgai5RAtc1/UXqGI3cBeKOI1Q+r8MDwCGg9IfRJvDkJ4YwSr5hGh62tfv+5vKy+jDHToWhx7GKxFUfl8HtMhbjSmYz5DPnhOzjxFogWxpaFV9ULXE4Rp+tnYf73KjreIg6LlP3MS+yxdp92Wblv2wm5AltxgbLvRKpRPNmhhXBhMRKppoiKtpuXlRc8RLum4sasWhIkdjXnU66s+sNpmibX/5L+AahqYyCllOFHAAAAAElFTkSuQmCC">
                                            </a>

                                        @endif

                                        @if($pet->usuario->contato->instagram !== null)

                                            <a href="{{$pet->usuario->contato->instagram}}">
                                                <img class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg" src="data:image/png;base64,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">
                                            </a>

                                        @endif

                                        @if($pet->usuario->contato->twitter !== null)

                                            <a href="{{$pet->usuario->contato->twitter}}">
                                                <img class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADIElEQVR4nO1ZO0sjURj91CiIz0oSmcXGJdoIwcZHxEYLsVEQ/4GgIv6AVL6iFv4C8RFshKipFFQEa8WgiDZKtFAQ0Q0bn6AmZ7kfyTBx47qOmHt3mQOnmDt34JyZ79z7zQyRBQsWLKiMb0S0SEQ3RIQ084aIAkTk/Iz4HxKE4xWFBs2MgUUFxCNOvxkDMsoGbzBixgAU44chWzAsA/S/lpDNZsPW1hZSYXp6+q8Etba24uXlBcvLy8jKykp/CVVWVuLh4QGxWAyBQAB+vx87Oztsor29/Y/XVldX4+7uDsFgEHl5efIy0NfXx4IHBgb4uKioCKenp7i6uoLD4Uh5jaZpOD8/Z2qaJjfEGRkZWFlZwfPzM2pra3nM7XZzaaytrfF54/zCwkLs7+8jEomgqqpKXgaMLCkpweXlJUKhEAoKCnhsfHycn0xvb68+Lzs7G+vr63h6ekJzc7PcENMrtrW1seDJyUld7Pb2Nu7v71FRUcFPYnZ2lud0d3ebEY8vNSCYENjR0ZEUchHUwcFBPuf1es2Kx5cbyM/Px/HxMQfYbrfzWH9/v768zs/P/5YJUsmAYH19PQd4dXWVxQpubGzwUtvU1PQZ8UiLAcHR0VG+4z09PXxcWlqK6+trnJyc6CFX2oDNZsPu7i4eHx85wMaQT01NqW8gNzcXe3t7XDYiwDk5OSlDrqSBzMxMLC0tsfi5uTkWPDw8rIf86OgoKeSkmoGJiQkW7fF49F06Go2isbGRz9fV1SWFnFQy0NXVxeJnZmb0MWOARRshxkZGRpJCTioYaGlp4X5oc3NTr/kEEwFOGEu04mKXdjqd8g24XC7c3t7i8PAQxcXFKef4fD420dnZycfl5eV8TTAY5LZDmgFRImdnZ7i4uEBZWdm7u3Q4HNZbaNHoCQwNDckxIDYlsVyKfqempuZdAQ0NDRzgg4MDfvlZWFjgztTYiqfNgKhj0e+LFea9ty8jx8bGkAohQysuJcRp4ochWzAsA/SPl9CNAqIR508zBgIKCEec4lP/h+FU6AfHdzIJLf5zISJBeCR+502Lt2DBggX6cvwCwA1eThB/fFIAAAAASUVORK5CYII=">
                                            </a>

                                        @endif

                                        @if($pet->usuario->contato->messenger !== null)

                                            <a href="{{$pet->usuario->contato->messenger}}">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAER0lEQVR4nO1ZzW8TRxRfpYVDjy09UThBu2t6Qy0BUuCfqFrRC0LqpYeqt6JccoNKCAkpQQmKoPRYUGkVmHFCZINoGwklfMWJEkLsJHZwjGMH52Oevf56aMZxEn9lZ+y1A5J/0pMsrz37+719782bt5rWRBNN1I6b+IHuhKMGgXaDwF86YeM6hSWdsKQw8RnG+DX+G52yVq0DW7SdxqF+2GcQ9ptBYd6ggCqmEwgYhF04QNlnDSd+gK58ahC4qlNmqhIvEUKZqVPo/rxvZU9DyH9B4LROIFor8RIjENEpfF834odHcJdBodd24rQktHr4vewl34cf6RRovckbmyIIv6c95EdwVyPJGxsi2KDjJu6uWUAjwsaomODQXRN5B4Ufdoq8kTcC31VFXh9c/sSgsLjTAnQC0apKLK/z9STW5orjpckkTixncCGetXoKV5TI893Rjk2q2A45Ac8+SmD/QhpTWdyAb217AZyLow/2K3hftAe2Ef9m3dt+toX1FtwNpiVygV2QY9+BLaJPqZO3y+HiRFJmzXneNFryF11lDcRPrHs7AKWss9kshiJLODnjL/j+zKOE1NqOfva1RPhAey3eTlfw9ioDnPD5cfSlD9cgvikKEVsH41L30SmckxFwW5b4KXfO26/KeDuPZCqFc8HX+HRyGsemZxASZsF1P7OoQFsFELhlHUL84LHNIl9KeDsfLuGlGD6f8gny4945TJjJkt8NLEgk8KaNygiIVvL21ekUhhMWGYmIKyJc5gRxbhMzfvEkyuHyC6kEztuitYAK9T8Utya+NVzy9mJ2HlPpdMX//DhsygsgLFG1gPZREz2xTNmwKQ6XvHkDQcxkthfe5orbLMDitHV4IJcDvd4UjsUyJeGSt9lgSAjbDgtWLURVIWSRxMV2b7yUfCC0iDJwhZQSWC6JVcoot3NDhTH/KhxBWXRNKSWwXBlV3cja7q3ik3Xy7jEfXhuaQtMi7vP4aUQhgXMb2a/WIURZq+JjxT+f+YWAW89m8R/3/9j70INRKK35xTjljqvt+JR9JdnMMb/Kwr/8tygE3Bj2CQHcOt0e9K5VfhJRUy2BdcrmpKd5vHVVWfzIwBo+nvSK8OHkb7iG8bjzDR4ZjONQJFNWwMOwagKz81o9DzR/PAng9X89+LtrGI85YwWtBy+5xeiZTsmTJyxx8A7bq6mATwRUBJx+8Aa77o9iq3O57PUOT7LgXPDzY6UE7tRU4eiPfWz3oZ73/UHIonc1K8LLkPI+RKqem/JZpZ0CqjGHE76tivyGCAI9OyigS7Pl5QWFvxtOnsDdk/fxQ/uGuwRIAwXcsW24WzTk7W5E2Jy0y/PlwGeVdRk5EgjXnLBKc1MCV/gGUztxxtfo5GVbazT47sjbDtXeiVvuP+y88g5bF3RgCx868bkN79n5wYOf7HIv8JgpTnkEnvNrvCUWXeW78Jq1iSa09x9vAV7LaYWk/U+hAAAAAElFTkSuQmCC">
                                            </a>

                                        @endif

                                        @if($pet->usuario->contato->telegram !== null)

                                            <a href="{{$pet->usuario->contato->telegram}}">
                                            <img src="data:image/png;base64,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">                          
                                            </a>

                                        @endif

                                        @if($pet->usuario->contato->facebook !== null)

                                            <a href="{{$pet->usuario->contato->facebook}}">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE1klEQVR4nO2Z609bZRzHT7ht64DJdWNlzA7GWoyvjIv+FZqomZkvJJkvfa8hjsNt0DEqQ2DQcqczJijgBXDqFuOyxPhCsxBMHPSyXg6l7WnP6SnQnkL5maeoYeG05zx9oGrCN/m9/3xPn9/v+T3fUtSRjnQkck1BtnYi9OqlcaGhdjw0XTvO/35xNBSsGeNi1aNcrHqED2qGuSXNcHBaYwo2nDexr1A0ZFH/tl74bPOczhzWaycF96UJAVDVjofg4hgqHmpGeage4eHCMJcozVAQnjehCsD5wYCraoDtUJvYyoyD10wJZTpz2KidFETtZBiw4Y0BqBpkE1V5xy9W3vENVBiZ0ozA190NX9VOrgd05jCQwp8bSBhIlLrfx57t9b19aOAvGSG37m54SGdeh0OAh7N9qLxQ0esdpIyQe9DwqjpzeCED8HDmEy+U96zNVxgZ1UHB52YS/nTPWqLKbq/+QNFLecQGMnRsYC98+W0PlHV7oLSbGSCD/zT8Dim8xsjCtXsCjC5G4IFDhF/XtuBnJgYPnSLMWaLw0UNBEr6sexVKP16Foi73lbTgtROhEt3kup8E/rVZHmz8NqTSI5eYFL7EwEBJFxPI70pjxKI5TwL/+iwP4vZOSvi9BiThDQwUdzFQ1Onqx4J/0bxRSXJJXTCx4BLioESPXGJq+FtuVGKRnqnC+fp6koZ9/35YEfzfBmTg4blOF5y66exQRk9DlnZCcJFMm+knUZCSI7QNb85wUDvo260BL2j61xTAu6BQ73CjpVGWP7FVEo7K5aB0474xw6VuWIM0/KmbTijUJ+qyrAG0EpPO+WBkf/N61uNwhgC+oMMB+XrHh/IGJkIzpJfUlkT//rIaI4Iv6HDAyXbH57IGasf4JdIbNi4xPe/bo0Tw+e0OUN2wL8oaqBkLBUjXAykD39uiRPAnbzyFE212v7yBUU4k3W2SG0gfXtX2FFSt9qisgeoRTsSBRxcWH915pqQUiwNwkfi+Mv22rgy+zQ4nWpQZCOB8eUGUXxdSqeknXhl8qx2OtdjkjxBKD3CODamBqzOsIvjjLTY43myTb2LNUHAG58yTGrg87FEG32KDY802+TGKchuchg0RGNiKA5TecimFh7wmyweyBlDohPOSqp/j4b2Fv2qeg2tzHEhZerwWg/qvA1D/FQvvfrlbV77wY8BbIafZ+rKiZa7KyDrTfQaiUSk1Rr+zRpRPm9b98LlNVofiNA8lZunCozmfzEC68HnIAG1pp5QKxX27iRk+PLqgpAzcs0RI4KNUwxM1hSMU96UDn9zAZrrwkN1o6cWCTxgY4ovVfT4/LjxaD5IZSAc+p9HCUvQf6eWmKKvEhUd7TSoDmPCQ3bjyFkUilFXiwKcygA1/fbmPItYUZJ/u8cziPEYkDaxsYsHnNK7MUfSPOeQG0K9gZFTl3Z55pfu8lIFvVzaVw19f+YaiDyjc/UdGyEVZpZJ9PrkBhceGPqAvLyWUVZYY3P5Uj5FkBmTgfcQNq1QF7e4SFPcVdbqjUutBMgPJLqlsNOfppWIq0yo2ONUoMSvUO5x7LykpAwvLG8/uNrTVmVgPcG/YQxENWSh0QrkNij4WveKGi4/FN2I7sLm1A0xoK25+LLBon0crcWKr/C/8zXqkI1H/f/0JPDNnaCVeJTwAAAAASUVORK5CYII=">
                                            </a>

                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
    </div>



    @if(Auth::check() and Auth::user()->id == $pet->usuario->id)

        <!-- Main modal -->
        <div id="editar-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-gray-100 rounded-lg shadow ">

                    <form action="/cadastrar/pet"  autocomplete="off" method="POST" enctype="multipart/form-data">

                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-green-600">
                            <h3 class="text-xl font-semibold text-blue-700">
                                Cadastro do animal
                            </h3>
                            <button type="button" class="text-blue-400 bg-transparent hover:bg-blue-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="editar-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class=" p-4 text-blue-700  text-lg font-semibold md:p-5 space-y-4 ">

                            <label class="block mb-2 "> Imagens</label>

                            <div class="grid grid-rows-2 grid-flow-row auto-rows-auto place-content-center">

                                @foreach($pet->imagensPets as $valor)
                                    
                                        <div class="" id="inputFormRow">
                                            <div class=" flex justify-end pb-1 pt-2 pr-1">
                                                <div role="button" class=" flex place-content-end drop-shadow-md hover:drop-shadow-xl text-white bg-red-500 hover:bg-red-600 font-bold rounded-lg text-sm sm:w-auto px-2.5 py-2.5 text-center focus:px-4 focus:py-2">
                                                    <input id="default-checkbox" name="idImagens[]" type="checkbox" value="{{$valor->id}}" class="w-5 h-5 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 focus:ring-red-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                                    <img class="w-5 h-5" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABMklEQVR4nO2YTU7CUBSFLxMc6ALAgboZVoMzYICMcQnojnCibkHdgUCCgyYfafqavDQlAu8Xcr/kTXpvXs959zRpK6IoileALvAIvAEbs5bAsKxJzgC3wCf7+Sh7JEeAKyPwP96znARVbGr+gBHQN2tsrtUMJTeoMl8zaqlPrPpScgNYWwJ7LfWeVV/FEPQMbEnPFpgfK77TONHUrE+ZwPxsJ9BGbNXiGzVwJKITaEBkxDcH3HMKXANPjj3JDHStlzqXnjQGDuk9dT8vqAF0Am5ohNAIuaERQiPkhkYIjZAbFx8hzv11muoj5QaYOfYkM+AVUQMNgCLiAArxDfAT0cBXCAOvEQ0sQhh4KP/rRxD/C9x5N2BMDMwNQoofBBFvmbgHXoBvTw92YfZaBDt5RblgdvxLfFa9l4ADAAAAAElFTkSuQmCC">
                                                </div>
                                            </div>
                                            <div role="button" class=" h-52 w-64 rounded-lg bg-gray-400 border-b border-blue-700 grid place-content-center" >
                                                <img class="h-52 w-64 rounded-lg border-b border-blue-700" src="{{$valor->getImagem()}}" alt="">
                                            </div>
                                            <input type="file" name="imagem[]" value="{{$valor->getImagem()}}" style="display: none" >
                                        </div>
                                    
                                @endforeach

                                <div class=" " id="newRow"></div>
                                  
                            </div>

                            <div class="flex">
                                <div role="button" id="addRow" class="drop-shadow-md hover:drop-shadow-xl text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-lg text-sm w-auto px-4 py-2.5 text-center ">
                                    <img class="w-8 h-8" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABU0lEQVR4nO2WO04DMRCGt4QqDUEgQkMNF0hCQxfRodBSUXEByhDgCtwEBdFTIRE4AgIOQBbq/dBIE2F5vWYfdhryS5Ysz+PbGcujTZKlloot4BD4IJ7egYELLIbYenOBF6IkMvgW2AI6wGSR4I6Rd/tfgCfaZoHe1QHfABvApu4bKykBHjl8zmODL3IOv34jT94H4BTYA1rAKrADnAD3QOYFF0E98FfgoERcvxHYgj9KdXq2DlwDz8C3rilwJbaiRJXAGnMGrOn+GEg915ACwyBgI1agGX8ry8HrgrW9rkq7cqeO8xnQDgGWO83JldfQZQjwixlr53DZgKkTXFIrGme2uev5wL7hlzb5EWg5wD0PeN/wm5mGQUX4rsbJm63f6rrS4VAVPK4NLPGcelZ75/qcD50Q8GGFAXIUBGrBZTgUSSoNCzXgbRkOwBPwpUv2Y7u9P46YHw+ibWfhAAAAAElFTkSuQmCC">
                                </div>
                            </div>

                            <script>

                                var rowCounter = 1; // Initialize a counter for rows

                                // Function to generate a unique ID for the inputs
                                function generateUniqueId() {
                                    return rowCounter++; // Increment the counter for each new row
                                }

                                // add row
                                $("#addRow").click(function () {
                                    var html = '';
                                    var uniqueId = generateUniqueId(); // Generate unique ID for the row

                                    html += '<div class="w-64" id="inputFormRow">';
                                    html += '    <div class=" flex justify-end pb-1 pt-2 pr-1">';
                                    html += '        <div role="button" class=" grid place-content-end drop-shadow-md hover:drop-shadow-xl text-white bg-red-500 hover:bg-red-600 font-bold rounded-lg text-sm sm:w-auto px-2.5 py-2.5 text-center focus:px-4 focus:py-2 removeRow">';
                                    html += '            <img class="w-5 h-5" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABMklEQVR4nO2YTU7CUBSFLxMc6ALAgboZVoMzYICMcQnojnCibkHdgUCCgyYfafqavDQlAu8Xcr/kTXpvXs959zRpK6IoileALvAIvAEbs5bAsKxJzgC3wCf7+Sh7JEeAKyPwP96znARVbGr+gBHQN2tsrtUMJTeoMl8zaqlPrPpScgNYWwJ7LfWeVV/FEPQMbEnPFpgfK77TONHUrE+ZwPxsJ9BGbNXiGzVwJKITaEBkxDcH3HMKXANPjj3JDHStlzqXnjQGDuk9dT8vqAF0Am5ohNAIuaERQiPkhkYIjZAbFx8hzv11muoj5QaYOfYkM+AVUQMNgCLiAArxDfAT0cBXCAOvEQ0sQhh4KP/rRxD/C9x5N2BMDMwNQoofBBFvmbgHXoBvTw92YfZaBDt5RblgdvxLfFa9l4ADAAAAAElFTkSuQmCC">';
                                    html += '        </div>';
                                    html += '    </div>';
                                    html += '    <div role="button" class=" h-52 w-64 rounded-lg bg-gray-400 border-b border-blue-700 grid place-content-center" >';
                                    html += '        <img class="h-52 w-64 rounded-lg border-b border-blue-700" id="imagePets_' + uniqueId + '" src="../img/image_exemple.png/" alt="">';
                                    html += '    </div>';
                                    html += '    <input type="file" name="imagem[]" style="display: none" id="imageUploadPets_' + uniqueId + '">';
                                    html += '</div>';
                                    $('#newRow').append(html);
                                });

                                // remove row
                                $(document).on('click', '.removeRow', function () {
                                    $(this).closest('#inputFormRow').remove();
                                });

                                $(document).ready(function () {
                                    // Event delegation for click event
                                    $(document).on('click', '[id^="imagePets_"]', function (e) {
                                        // Find the corresponding image upload input and trigger its click event
                                        var uniqueId = this.id.split('_')[1];
                                        $('#imageUploadPets_' + uniqueId).click();
                                    });

                                    // Function to preview image
                                    function previewProfileImage(uploader, imageId) {
                                        // Ensure a file was selected
                                        if (uploader.files && uploader.files[0]) {
                                            var imageFile = uploader.files[0];
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                // Set the image data as source for the corresponding image
                                                $('#' + imageId).attr('src', e.target.result);
                                            };
                                            reader.readAsDataURL(imageFile);
                                        }
                                    }

                                    // Change event handler for image upload input
                                    $(document).on('change', '[id^="imageUploadPets_"]', function () {
                                        // Extract the unique ID from the input's ID
                                        var uniqueId = this.id.split('_')[1];
                                        // Call previewProfileImage with the uploader and the corresponding image ID
                                        previewProfileImage(this, 'imagePets_' + uniqueId);
                                    });
                                });

                            </script>

                            <div class="mb-5">
                                <label for="nome" class="block mb-2 ">* Nome </label>
                                <input type="text" maxlength="45" value="{{old('nome', $pet->nome)}}" name="nome" class="bg-blue-100 border border-blue-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
                            </div>

                            <div class="mb-5">
                                <label for="descricao" class="block mb-2 "> Descrição </label>
                                <textarea type="text" maxlength="455"  name="descricao" class="bg-blue-100 border border-blue-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 h-40 w-full p-2.5 ">{{old('descricao', $pet->descricao)}} </textarea>
                            </div>
                            
                            <div class="mb-5">
                                <label for="tipo" class="block mb-2 ">* Tipo </label>
                                <select name="tipo"  {{ old('tipo', $pet->tipo) == 'tipo' ? 'selected' : '' }} class="bg-blue-100 border border-blue-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                                    <option value="">...</option>
                                    <option value="1">Canino</option>
                                    <option value="2">Felino</option>
                                    <option value="3">Aves</option>
                                    
                                </select>
                            </div>

                            <div class="mb-5">
                                <label for="peso" class="block mb-2 "> Peso (Kg) </label>
                                <input type="text" value="{{old('peso', $pet->peso)}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="45"  name="peso" class="bg-blue-100 border border-blue-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
                            </div>

                            <div class="mb-5">
                                <label for="tamanho" class="block mb-2 "> Tamanho </label>
                                <select name="tamanho" value="{{old('tamanho', $pet->tamanho)}}" class="bg-blue-100 border border-blue-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="">...</option>
                                    <option value="1">Filhote</option>
                                    <option value="2">Pequeno</option>
                                    <option value="3">Médio</option>
                                    <option value="4">Grande</option>
                                    
                                </select>
                            </div>

                            <div class="mb-5 hidden">
                                <label for="id" class="block mb-2 "> id </label>
                                <input type="text"  value="{{$pet->id}}" name="id" class=" bg-blue-100 border border-blue-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
                            </div>

                            

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t rounded-b border-blue-600">
                            <div class="block flex gap-2 mb-5">
                                <div role="button"data-modal-hide="editar-modal" type="button" class="drop-shadow-md hover:drop-shadow-xl text-white bg-gray-600 hover:bg-gray-700 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center focus:px-4 focus:py-2 ">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtElEQVR4nO3QMWoCQRiGYQ8STLC08CDZHGqbgFgriKSytVrwCkJI6SUECwtNl2SfMLArW6zJTGEh7tvNP/PzfvP1eh0dtwPG1xYE8pb5CK/4wA5f2OMdk3CfIjhL8IgCpf9ZYxArCCxxaJy/q8SzUCWm2FTzmhOyWEFNiTc8XdjpY46fRpDnFMEqst4Mn9XOsTXQH/3mkZKXxk+KFEGKZNGodpgiiJKEarANb/EQE6qj4x74BYaklQwjuGIwAAAAAElFTkSuQmCC">
                                </div >

                                {!! csrf_field() !!}

                                <button type="submit" type="button" class="drop-shadow-md hover:drop-shadow-xl text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center focus:px-4 focus:py-2 ">Salvar</button>
                            </div >
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow bg-gray-700">
                    
                    <button type="button" class="absolute top-3 end-2.5 text-blue-400 bg-transparent hover:bg-blue-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-600">
                            Deseja prosseguir com a ação?

                            <p class="text-base font-normal text-gray-500 ">Estas credenciais serão permanentemente excluídas!</p>
                        </h3>

                        

                        <div class="block flex justify-center gap-6 mb-5">
                            <div role="button" data-modal-hide="popup-modal" class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center focus:px-4 focus:py-2 ">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtElEQVR4nO3QMWoCQRiGYQ8STLC08CDZHGqbgFgriKSytVrwCkJI6SUECwtNl2SfMLArW6zJTGEh7tvNP/PzfvP1eh0dtwPG1xYE8pb5CK/4wA5f2OMdk3CfIjhL8IgCpf9ZYxArCCxxaJy/q8SzUCWm2FTzmhOyWEFNiTc8XdjpY46fRpDnFMEqst4Mn9XOsTXQH/3mkZKXxk+KFEGKZNGodpgiiJKEarANb/EQE6qj4x74BYaklQwjuGIwAAAAAElFTkSuQmCC">
                            </div >

                            <form action="/excluir/pet/{{$pet->id}}" method="POST">

                                {!! csrf_field() !!}

                                <button type="submit" class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg text-white bg-red-700 hover:bg-red-800 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                                        Excluir
                                </button>
                            </form>
                        </div>

                        </div>
                </div>
            </div>
        </div>
                
    @endif

@endsection