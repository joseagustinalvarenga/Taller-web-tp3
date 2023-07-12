<?php

namespace App\Controllers;

class Home extends BaseController
{
    public $modelUser = NULL;
    public function __construct(){
        $this->modelUser = model("UserModel");

    }
    public function index()
    {
        $data = $this->modelUser->list();
        //echo var_dump ($data);
        return view('iniciar_sesion',$data);
    }
    public function usuarios($name){
        return "<h1>Hola mundo</h1>" . $name;
    }
}
