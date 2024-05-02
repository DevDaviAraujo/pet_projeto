<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Hash;
use Illuminate\Validation\Rule;
use Session;
use \App\Models\Usuarios;
use \App\Models\Pets;
use \App\Models\ImagensPet;
use \App\Models\Adjetivos;
use \App\Models\Contatos;
use \App\Models\Enderecos;

class WebsiteController extends Controller {

    public function refreshable() {
        return view('website.refreshable');
    }

    public function home() {

        $pets = Pets::query();

        $pets = $pets->paginate(8);

        return view('website.home', compact('pets'));
    }
    public function login() {
        return view('website.login');
    }
    public function cadastro() {
        return view('website.cadastro');
    }
    public function usuario($username) {
        
        if($username) {

            $usuario = Usuarios::where("username",$username)->first();

            return view('website.usuario', compact('usuario'));

        } else {

            return view('errors.404');

        }
    }

    public function pet($id) {

        if($id) {

            $pet = Pets::where("id",$id)->first();
    
            return view('website.pet', compact('pet'));

        } else {

            return view('errors.404');

        }
    }
    public function pesquisar(Request $request) {

        $pesquisa = $request->pesquisa;

        $pets = Pets::query();

        if ($pesquisa) {

            $pets = $pets->where(function($query) use ($pesquisa) {

                $query->where('nome','like','%'.$pesquisa.'%')->orWhere('descricao','like','%'.$pesquisa.'%');

            })->orWhereHas('adjetivos',function($query) use ($pesquisa) { 

                $query->where('texto','like','%'.$pesquisa.'%');

            })->orWhereHas('usuario',function($query) use ($pesquisa) {

                $query->whereHas('endereco',function($query) use ($pesquisa) {

                    $query->where('bairro','like','%'.$pesquisa.'%')->orWhere('cidade','like','%'.$pesquisa.'%')->orWhere('uf','like','%'.$pesquisa.'%');

                });

            });

        }

        if($request->tamanho) {

            $pets = $pets->where('tamanho',$request->tamanho);

        }

        if($request->tipo) {

            $pets = $pets->where('tipo',$request->tipo);

        }

        $pets = $pets->paginate(8);

        
        return view('website.home', compact('pesquisa','pets'));

    }


}