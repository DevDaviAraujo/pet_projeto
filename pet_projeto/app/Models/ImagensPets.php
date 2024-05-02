<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ImagensPets extends  Model { 

    public function getImagem() {

        if ($this->imagem != null) {
            return '../uploads/pets/' . $this->imagem;
        } else {
            return '../img/pets.png';
        }
    }

}