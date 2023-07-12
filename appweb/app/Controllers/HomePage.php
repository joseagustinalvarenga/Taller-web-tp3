<?php

namespace App\Controllers;
use App\Models\Playlist;
use App\Models\Video;
use App\Models\UserModel;


class HomePage extends BaseController{

    public function index(){
        return view('home_page');
    }

    public function guardarVideo(){
        $video = model(Video::class);
        $datosVideo = [
        'id_video' => $this->request->getPost('idVideo'),
        'id_categoria' => $this->request->getPost('idCategoria'),
        'termino_busqueda' => $this->request->getPost('termino_busqueda')
        ];
        $video->save($datosVideo);
    }

    public function guardar_categoria(){
        $categoria = model(Playlist::class);
        $usuario = new UserModel();
        $id_usuario = $usuario->buscarId($this->request->getPost('email'));
        $datosCategoria = [
        'titulo' => $this->request->getPost('titulo'),
        'id_usuario' => $id_usuario
        ];
        $categoria->save($datosCategoria);
        echo json_encode($categoria->insertID);
    }

    public function listar_categorias_usuario(){
        $usuario = new UserModel();
        $id_usuario = $usuario->buscarId($this->request->getPost('email'));
        $categoria = model(Playlist::class);
        $listaCategorias = $categoria->listar_categorias($id_usuario);
        echo json_encode($listaCategorias);
    }

    public function listar_videos_categoria(){
        $video = new Video();
        $listaVideos = $video->listar_videos_por_categoria($this->request->getPost('id_categoria'));
        echo json_encode($listaVideos);
    }

}