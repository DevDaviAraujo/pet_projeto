<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use \App\Models\ImagensPets;

class Pets extends  Model { 

    public function usuario() {
        return $this->hasOne(Usuarios::class,'id', 'idUsuarios');
    }

    public function imagensPets() {
        return $this->hasMany(ImagensPets::class, 'idPets');
    }
    public function adjetivos() {
        return $this->hasMany(Adjetivos::class, 'idPets')->latest();
    }
    public function imagemPet() {
        return $this->imagensPets()->limit(1);
    }
    public function excluirPet() {
        
        $imagensPet = ImagensPets::where('idPets',$this->id)->get();

        foreach ($imagensPet as $chave => $imagem) {

            $file_name = $imagem->getImagem();
            $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
            $file_delete =  "$base_dir/your_inner_directories_path/$file_name";

            unlink($file_delete);

            $imagem->delete();

        }

        $this->delete();

    }

}
