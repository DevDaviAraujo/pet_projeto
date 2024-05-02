<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Hash;
use Illuminate\Validation\Rule;
use Session;
use View;
use \App\Models\Usuarios;
use \App\Models\Pets;
use \App\Models\ImagensPets;
use \App\Models\Adjetivos;
use \App\Models\Contatos;
use \App\Models\Enderecos;

class UsuariosController extends Controller {

    public function cadastrarUsuario(Request $request) {

        if(!$request->id) {

            // cadastro de usuário.

            $validacao = Validator::make($request->all(), [
                'username' => 'required|max:45|unique:usuarios',
                'email' => 'required|max:255|unique:usuarios',
                'password' => 'required',
                'passwordConfirme' => 'required|same:password',
                'cep' => 'required|min:8|max:8'
                
            ], [
                'passwordConfirme.same' => 'As senhas diferem!',
                'email.unique' => 'E-mail já cadastrado!',
                'username.unique' => 'Nome de usuário indisponível!',
                'cep.min' => 'CEP inválido!'
            ]);

            if ($validacao->fails()) {
                return redirect()->back()->withErrors($validacao)->withInput();
            } else {

                $usuario = new Usuarios();
                $usuario->username = trim($request->username);
                $usuario->email = trim($request->email);
                $usuario->password = Hash::make(trim($request->password));
                $usuario->save();

                $usuarioContato = new Contatos();
                $usuarioContato->idUsuarios = $usuario->id;
                $usuarioContato->save();

                $usuarioEndereco = new Enderecos();
                $usuarioEndereco->idUsuarios = $usuario->id;
                $usuarioEndereco->cep = $request->cep;
                $usuarioEndereco->uf = $request->uf;
                $usuarioEndereco->cidade = $request->cidade;
                $usuarioEndereco->bairro = $request->bairro;
                $usuarioEndereco->save();

                return redirect("/login")->with('successMessage', 'Sucesso ao cadastrar');

            }

        } else {

            // edição de credencias do usuário.

            $validacao = Validator::make($request->all(), [
                'username' => 'required|max:45|unique:usuarios,username,' . $request->id,
                'email' => 'required|max:255|unique:usuarios,email,' . $request->id,
                'imagem' => 'image|mimes:jpeg,png,jpg,svg|max:8192',
                'cep' => 'required|min:8|max:8'
                
            ], [

                'email.unique' => 'E-mail já cadastrado',
                'username.unique' => 'Nome de usuário indisponível',
                'imagem.mimes' => 'Arquivo inválido!',
                'cep.min' => 'CEP inválido!'
            ]);

            if ($validacao->fails()) {
                return redirect()->back()->withErrors($validacao)->withInput();
            } else {

                $image = false;
                $image = $request->file('imagem');
                if ($image) {

                    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();


                    $destino = public_path('/uploads/usuarios');

                    $image->move($destino, $input['imagename']);

                } else {
                    $input['imagename'] = null;
                }

                $usuario = Usuarios::where("id",$request->id)->first();
                $usuario->username = $request->username;
                $usuario->email = $request->email;
                if ($image) {

                    if($usuario->imagem) {

                        $file_name = $usuario->getImagem();
                        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
                        $file_delete =  "$base_dir/your_inner_directories_path/$file_name";

                        unlink($file_delete);
                    }

                    $usuario->imagem = $input['imagename'];
                }
                $usuario->save();

                $usuarioContato = Contatos::where("idUsuarios",$request->id)->first();
                $usuarioContato->whatzap = $request->whatzap;
                $usuarioContato->instagram = $request->instagram;
                $usuarioContato->twitter = $request->twitter;
                $usuarioContato->messenger = $request->messenger;
                $usuarioContato->telegram = $request->telegram;
                $usuarioContato->facebook = $request->facebook;
                
                $usuarioContato->save();


                $usuarioEndereco = Enderecos::where("idUsuarios",$request->id)->first();
                $usuarioEndereco->cep = $request->cep;
                $usuarioEndereco->uf = $request->uf;
                $usuarioEndereco->cidade = $request->cidade;
                $usuarioEndereco->bairro = $request->bairro;

                $usuarioEndereco->save();
                

                return redirect()->back()->with('successMessage', 'Credenciais salvas!');

            }

        }
    }

    public function cadastrarPet(Request $request) {

        $validacao = Validator::make($request->all(), [
            'nome' => 'required|max:45',
            'descricao' => 'max:455',
            'imagem[]' => 'image|mimes:jpeg,png,jpg,svg|max:8192'
            
            
        ], [

            'imagem[].mimes' => 'Arquivo inválido!',
            
        ]);

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao)->withInput();
        } else { 

            if($request->id) {

                $pet = Pets::where("id",$request->id)->first();

                if ($request->idImagens) {

                    foreach ($request->idImagens as $chave => $id) {

                        $imagens = ImagensPets::where('id', $id)->first();

                        $file_name = $imagens->getImagem();
                        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
                        $file_delete =  "$base_dir/your_inner_directories_path/$file_name";

                        unlink($file_delete);

                        $imagens->delete();

                    }

                }

            } else {

                $pet = new Pets();

            }

            
            $pet->nome = trim($request->nome);
            if($request->descricao) {
                $pet->descricao = trim($request->descricao);
            }
            $pet->tipo = $request->tipo;
            if($request->peso) {
                $pet->peso = trim($request->peso);
            }
            if($request->tamanho) {
                $pet->tamanho = $request->tamanho;
            }
            if(!$request->id) {
                $pet->idUsuarios = $request->idUsuarios;
            }
            $pet->save();

            if ($request->imagem) {

                foreach ($request->imagem as $chave => $valor) {

                    $image = $request->file('imagem')[$chave];
                    $input['imagename'] = $chave . time() . '.' . $image->getClientOriginalExtension();
                    // pasta de imagens
                    $destinationPath = public_path('/uploads/pets');


                    $image->move($destinationPath, $input['imagename']);

                    $imagem = new ImagensPets();
                    $imagem->idPets = $pet->id;
                    $imagem->imagem = $input['imagename'];
                    $imagem->save();

                }

            }
            
            return redirect()->back()->with('successMessage', 'Sucesso ao salvar!');
            
        }



    }

    public function excluirUsuario($id) {

        $usuario = Usuarios::where('id',$id)->first();

        if($usuario->imagem) {

            $file_name = $usuario->getImagem();
            $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
            $file_delete =  "$base_dir/your_inner_directories_path/$file_name";

            unlink($file_delete);

        }


        foreach($usuario->pets as $pet) {

            $pet->excluirPet();

        }

        $contato = Contatos::where('idUsuarios',$usuario->id)->delete();
        $endereco = Enderecos::where('idUsuarios',$usuario->id)->delete();

        $usuario->delete();

        return redirect('/login');

    }
    public function excluirPet($id) {

        $pet = Pets::where('id',$id)->first();

        $username = $pet->usuario->username;

        $adjetivo = Adjetivos::where('idPets',$pet->id)->delete();

        $pet->excluirPet();

        return redirect('/usuario/'.$username);

    }

    public function loginUsuario(Request $request) {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $usuario = Usuarios::where('id', Auth::user()->id)->first();
            date_default_timezone_set("america/Sao_Paulo");
            $usuario->dataAcesso = date("Y-m-d H:i:s");
            $usuario->save();

            return redirect()->intended('/home');
        }

        return redirect()->back()->with('errorMessage', 'Credencias incorretas!');


    }

    public function deslogarUsuario(Request $request)
    {

        if (Auth::guard('web')->check()) {

            date_default_timezone_set("america/Sao_Paulo");
            $usuario = Usuarios::where('id', Auth::user()->id)->update(['dataUltimoAcesso' => date("Y-m-d H:i:s")]);

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login');

        }

    }

    public function cadastrarAdjetivo(Request $request) {

        if ($request->texto) {

            $adjetivo = new Adjetivos();

            $adjetivo->idPets = $request->idPets;
            $adjetivo->texto = $request->texto;
            
            $adjetivo->save();
        }
        
        return redirect()->back();

    }

    public function excluirAdjetivo(Request $request) {

        $adjetivo = Adjetivos::where('id',$request->id)->delete();

        return redirect()->back();

    }

}