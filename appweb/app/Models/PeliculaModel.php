<?php

namespace App\Models;

use CodeIgniter\Model;

class PeliculaModel extends Model
{
    protected $table = 'peliculas'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_usuario', 'titulo', 'anio', 'descripcion', 'espectadores']; 

    public function obtenerVideosGuardados($usuarioId)
    {
        return $this->where('id_usuario', $usuarioId)->findAll();
    }
}
