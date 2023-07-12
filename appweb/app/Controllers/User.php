<?php

namespace App\Controllers;
//use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{

    public function list(){
        
        $model = model(UserModel::class);
        $data['users'] = $model->list();
        return view('listado',$data);

    }

    public function insert(){
        if ($this->request->getMethod() == 'post'){
            $nuevoUsuario = new UserModel();
            if($nuevoUsuario->consultarEmail($this->request->getPost('email'))){
                echo '<script language="javascript">alert("Correo Invalido");</script>';
            }else{
                if($this->request->getPost('genero_masculino')  ){
                    $genero=1;
                }elseif ($this->request->getPost('genero_femenino')) {
                    $genero=2;
                }else{
                    $genero=0;
                }
                $datosNuevoUsuario = [
                    'email' => $this->request->getPost('email'),
                    'contrasena' => md5($this->request->getPost('password')),
                    'nombre' => $this->request->getPost('nombre'),
                    'apellido' => $this->request->getPost('apellido'),
                    'genero' => $genero,
                    'numtel' => $this->request->getPost('num_tel'),
                    'fechanacimiento' => $this->request->getPost('fecha_nacimiento'),
                    'pagweb' => $this->request->getPost('pagina'),
                    'pais' => $this->request->getPost('pais'),
                    'provincia' => $this->request->getPost('provincia'),
                    'ciudad' => $this->request->getPost('ciudades'),
                    'calle' => $this->request->getPost('calle_user'),
                    'altura' => $this->request->getPost('altura_calle'),
                ];
                print_r($datosNuevoUsuario);
                $nuevoUsuario->save($datosNuevoUsuario);
                if(isset($nuevoUsuario->insertID)){
                    echo '<script language="javascript">alert("Usuario creado correctamente");</script>';
                    return view ('iniciar_sesion');
                }else{
                }
            }
        }
    }

    public function register(){
        return view('registrar');
    }

    public function mostrar_login (){
        return view ('iniciar_sesion');
    }

    public function verificaremail(){
        $email = json_decode($_POST['email']);
        $model = new UserModel();
        $bandera = $model->consultarEmail($email);
        if($bandera){
            $data['bandera'] = 0;
			$data['mensaje'] = 'Email invalido';
			echo  json_encode($data);
        }else{
            $data['bandera'] = 1;
			$data['mensaje'] = 'Email valido';
			echo  json_encode($data);
        }
    }

    public function iniciar_sesion(){
        $usuario = new UserModel();
        $email = $this->request->getPost('email');
        $contrasena = $this->request->getPost('contrasenia');
        if($usuario->consultarIniciarSesion($email,$contrasena)){
            return view('home_page');
            echo '<script language="javascript">alert("ENTRO ACA");</script>';
        }else{
            echo '<script language="javascript">alert("CORREO INCORRECTO ");</script>';
            return view ('iniciar_sesion');
        }
        
    }

    public function consultar_nombre(){
        $email = $this->request->getPost('email');
        $usuario = new UserModel();
        $data['nombre_usuario'] = $usuario->nombre_usuario($email);
        echo json_encode($data);
    }

    public function obtener_datos_usuario(){
        $email = $this->request->getPost('email');
        $usuario = new UserModel();
        $datos_usuario = $usuario->buscarUsuario($email);
        echo json_encode($datos_usuario);
    }

    public function mostrar_perfil(){
        return view('modificar_perfil');
    }

    public function modificar_datos_usuario(){
        $id = (int)($this->request->getPost('id'));
        $modificarUsuario = new UserModel();
        $datosModificarUsuario = [
            'email' => $this->request->getPost('email'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'genero' => $this->request->getPost('genero'),
            'numtel' => $this->request->getPost('numtel'),
            'fechanacimiento' => $this->request->getPost('fechanacimiento'),
            'pagweb' => $this->request->getPost('pagweb'),
            'pais' => $this->request->getPost('pais'),
            'provincia' => $this->request->getPost('provincia'),
            'ciudad' => $this->request->getPost('ciudad'),
            'calle' => $this->request->getPost('calle'),
            'altura' => $this->request->getPost('altura')
        ];
        $modificarUsuario->update($id,$datosModificarUsuario);
    }
}