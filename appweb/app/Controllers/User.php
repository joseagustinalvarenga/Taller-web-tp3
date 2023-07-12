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
                echo '<script language="javascript">alert("Este Mail ya pertenece a un usuario");</script>';
                return view('registrar');

            }else{
                if($this->request->getPost('genero_masculino')  ){
                    $genero=1;
                }elseif ($this->request->getPost('genero_femenino')) {
                    $genero=2;
                }else{
                    $genero=0;
                }
                $token = bin2hex(random_bytes(32));
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
                    'calle' => $this->request->getPost('direc'),
                    'altura' => $this->request->getPost('estatura'),
                    'token' => $token,
                ];
                print_r($datosNuevoUsuario);
                $nuevoUsuario->save($datosNuevoUsuario);
                $this->enviarCorreoVerificacion($datosNuevoUsuario['email'], $token);

                if(isset($nuevoUsuario->insertID)){
                    echo '<script language="javascript">alert("Usuario creado correctamente");</script>';
                    return view ('iniciar_sesion');
                }else{
                }
            }
        }
    }

    private function enviarCorreoVerificacion($email, $token)
    {
        // Configurar el envío de correo electrónico
        $emailConfig = \Config\Services::email();
        $emailConfig->setFrom('your@example.com', 'Your Name');
        $emailConfig->setTo($email);
        $emailConfig->setSubject('Verificación de cuenta');
        
        // Crear el enlace de verificación con el token
        $verificationLink = base_url('email/validar_cuenta/' . $token);
        $message = 'Por favor, haga clic en el siguiente enlace para verificar su cuenta: ' . $verificationLink;
        $emailConfig->setMessage($message);
        
        // Enviar el correo electrónico
        $emailConfig->send();
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
            return view('modificar_perfil');
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

    public function validar_cuenta($token) {
        $model = new UserModel();
        $cuenta = $model->obtenerPorToken($token);
    
        if ($cuenta) {
            $tokenBaseDatos = $cuenta['token'];
    
            if ($token === $tokenBaseDatos) {
                // Token válido: Actualizar el estado de la cuenta como validada
                $cuenta['validada'] = true;
                $model->actualizar($cuenta);
                // Realizar otras acciones necesarias después de validar la cuenta
    
                // Redireccionar a una página de éxito o mostrar un mensaje de éxito
                echo "Cuenta validada exitosamente";
            } else {
                // Token no válido: Mostrar un mensaje de error o redireccionar a una página de error
                echo "El token no es válido";
            }
        } else {
            // Token no válido: Mostrar un mensaje de error o redireccionar a una página de error
            echo "El token no existe";
        }
    }
    
}