<?php

namespace App\Models;

use CodeIgniter\Model;

class Video extends Model{
    protected $table = 'video';
    protected $allowedFields = ['id_video','id_categoria','termino_busqueda'];

    public function listar_videos_por_categoria($id_categoria){
        return $this->where('id_categoria',$id_categoria)->findAll();
    }
}