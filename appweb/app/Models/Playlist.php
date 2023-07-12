<?php

namespace App\Models;

use CodeIgniter\Model;

class Categoria extends Model{
    protected $table = 'categoria';
    protected $allowedFields = ['id','titulo','id_usuario'];

    public function listar_categorias($id_usuario){
        return $this->where('id_usuario',$id_usuario)->findAll();
    }
}