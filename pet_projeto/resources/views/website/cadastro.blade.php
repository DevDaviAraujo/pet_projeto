<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />




    <script>
        
        function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
            
        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";


                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };

    </script>


</head>
<body class="bg-orange-500 text-white">


    <div class="max-w-screen-xl flex grid justify-items-center mx-auto p-6">
        <a href="/home" class="flex items-center space-x-3">
            <img src="data:image/png;base64,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" class="h-17" alt="Flowbite Logo" />
            <span class="self-center text-5xl font-semibold whitespace-nowrap">PetShare</span>
        </a>
    </div>

    <div class="justify-items-end pl-32">

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

    </div>

    <form action="/cadastrar/usuario" autocomplete="off" method="POST" class="max-w-screen-xl flex grid grid-cols-2 justify-items-center mx-auto p-6">
        

        <div  class="w-80 drop-shadow-xl rounded-lg bg-orange-400  max-w-sm mx-auto">

            <div class="p-10 text-xl font-medium">

                <div class="w-full flex grid justify-items-center">
                    

                    <div class="mb-5">

                        <span class="block mb-2 text-3xl font-semibold">Usuário</span>

                    </div>

                    <div class="mb-5">
                        <label for="username" class="block mb-2 "> @</label>
                        <input type="text" maxlength="45" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 " placeholder="@nomeusuario" required />
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block mb-2 "> Email</label>
                        <input type="email" maxlength="255" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 " placeholder="nome@exemplo.com" required />
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block mb-2  "> Senha </label>
                        <input type="password" maxlength="45" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 " required />
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block mb-2  "> Confirme a senha </label>
                        <input type="password" maxlength="45" name="passwordConfirme" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 " required />
                    </div>
                    
                </div>

                
            </div>
        </div>

        <div class="drop-shadow-xl rounded-lg bg-orange-400  max-w-sm mx-auto">

            <div class="p-10 text-xl font-medium">

                <div class="max-w-screen-xl flex grid justify-items-center">
                    

                    <div class="mb-5">

                        <span class="block mb-2 text-3xl font-semibold">Endereço</span>

                    </div>

                    <div class="mb-5">
                        <label for="cep" class="block mb-2 "> CEP</label>
                        <input type="text" maxlength="8" name="cep" id="cep" onblur="pesquisacep(this.value);" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 " required />
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2  "> Estado </label>
                        <input type="text" maxlength="2" name="uf" id="uf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 " required />
                    </div>

                    <div class="mb-5">
                        <label for="cidade" class="block mb-2 "> Cidade</label>
                        <input type="text" maxlength="255" name="cidade" id="cidade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 "  required />
                    </div>

                    <div class="mb-5">
                        <label for="bairro" class="block mb-2 "> bairro</label>
                        <input type="text" maxlength="255" name="bairro" id="bairro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 "  required />
                    </div>

                    {!! csrf_field() !!}
                    

                    <div class="block flex gap-2 mb-5">
                        <a href="/login" >
                            <div class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center focus:px-4 focus:py-2 ">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAtElEQVR4nO3QMWoCQRiGYQ8STLC08CDZHGqbgFgriKSytVrwCkJI6SUECwtNl2SfMLArW6zJTGEh7tvNP/PzfvP1eh0dtwPG1xYE8pb5CK/4wA5f2OMdk3CfIjhL8IgCpf9ZYxArCCxxaJy/q8SzUCWm2FTzmhOyWEFNiTc8XdjpY46fRpDnFMEqst4Mn9XOsTXQH/3mkZKXxk+KFEGKZNGodpgiiJKEarANb/EQE6qj4x74BYaklQwjuGIwAAAAAElFTkSuQmCC">
                            </div >
                        </a>
                        
                        <button type="submit" class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg text-white bg-orange-700 hover:bg-orange-800 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Cadastrar</button>
                        
                    </div>
                    
                </div>

                
            </div>
        </div>

        <br>

        <br>

</form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>