<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;
use Auth;
use DateTime;
use DateInterval;

use \App\Models\Contatos;
use \App\Models\Enderecos;
use \App\Models\Pets;

class Usuarios extends Authenticatable {

    public function contato() {
        return $this->hasOne(Contatos::class, 'idUsuarios');
    }

    public function endereco() {
        return $this->hasOne(Enderecos::class, 'idUsuarios');
    }

    public function pets() {
        return $this->hasMany(Pets::class, 'idUsuarios');
    }

    public function getImagem() {

        if ($this->imagem != null) {
            return '../uploads/usuarios/' . $this->imagem;
        } else {
            return '../img/user.png';
        }
    }
    

}