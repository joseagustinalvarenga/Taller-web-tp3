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
                    'direccion' => $this->request->getPost('direc'),
                    'estatura' => floatval($this->request->getPost('estatura_ent') . '.' . $this->request->getPost('estatura_dec')),
                    'colorOjos' => $this->request->getPost('color-ojos'),
                    'username' => $this->request->getPost('username'),
                    'token' => $token,
                ];
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
    $emailConfig = \Config\Services::email();
    $emailConfig->setFrom('pruebataller@example.com', 'PRUEBA');
    $emailConfig->setTo($email);
    $emailConfig->setSubject('Verificación de cuenta');

    // Crear el enlace de verificación con el token
    $verificationLink = base_url('../Taller-web-tp3/appweb/public/User/validar_cuenta/' . $token);

    // Construir el contenido del mensaje
    $message = 'Por favor, haga clic en el siguiente enlace para verificar su cuenta: ' . $verificationLink;
    //echo "hola:",json_encode($message);
    $emailConfig->setMessage($message);
    try {
        if ($emailConfig->send()) {
            return true; // El correo se envió correctamente
        } else {
            return false; // Error al enviar el correo
        }
    } catch (\Exception $e) {
        log_message('error', 'Error al enviar el correo: ' . $e->getMessage());
        return false; // Error al enviar el correo
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
            $usuarioId = $usuario->buscarId($email);
            return redirect()->to(base_url('../Taller-web-tp3/appweb/public/TraktController/index/'. $usuarioId));
            echo '<script language="javascript">alert("ENTRO ACA");</script>';
        }else{
            echo '<script language="javascript">alert("CORREO INCORRECTO ");</script>';
            return view ('modificar_perfil');
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

    public function obtenerDatosUsuario()
    {
        $email = $this->request->getPost('email');
    
        // Realizar la lógica para obtener los datos del usuario según el correo electrónico
        $usuario = new UserModel();
        $datos_usuario = $usuario->buscarUsuario($email);
    
        // Devolver la respuesta como JSON
        return $this->response->setJSON($datos_usuario);
    }
    


    public function mostrar_perfil(){
        return view('modificar_perfil');
    }

    public function update(){
        $usuario = new UserModel();
        $datos_usuario = $usuario->buscarUsuario($this->request->getPost('email'));
        $id = $datos_usuario['id'];
        print_r($id);
        $modificarUsuario = new UserModel();
        if($this->request->getPost('genero_masculino')  ){
            $genero=1;
        }elseif ($this->request->getPost('genero_femenino')) {
            $genero=2;
        }else{
            $genero=0;
        }
        $datosModificarUsuario= [
            'email' => $this->request->getPost('email'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'genero' => $genero,
            'numtel' => $this->request->getPost('num_tel'),
            'fechanacimiento' => $this->request->getPost('fecha_nacimiento'),
            'pagweb' => $this->request->getPost('pagina'),
            'pais' => $this->request->getPost('pais'),
            'provincia' => $this->request->getPost('provincia'),
            'ciudad' => $this->request->getPost('ciudades'),
            'direccion' => $this->request->getPost('direc'),
           // 'estatura' => floatval($this->request->getPost('estatura_ent') . '.' . $this->request->getPost('estatura_dec')),
            'colorOjos' => $this->request->getPost('color-ojos'),
            //'username' => $this->request->getPost('username'),
        ];
        //print_r($datosModificarUsuario);
        $modificarUsuario->update($id,$datosModificarUsuario);
        $filasAfectadas = $modificarUsuario->update($id, $datosModificarUsuario);

        if ($filasAfectadas > 0) {
            echo '<script>alert("Usuario modificado correctamente");</script>';
            return view('iniciar_sesion');
        } else {
            echo '<script>alert("No se pudo modificar el usuario");</script>';
            return view('modificar_perfil');
        }

    }

    public function validar_cuenta($token) {
        $model = new UserModel();
        $cuenta = $model->obtenerPorToken($token);
        
        if ($cuenta) {
            $tokenBaseDatos = $cuenta['token'];
    
            if ($token === $tokenBaseDatos) {
                $cuenta['validada'] = true;
                $model->actualizar($cuenta);
                echo '<script language="javascript">alert("Cuenta validada correctamente");</script>';
                    return view ('iniciar_sesion');
            } else {
                echo '<script language="javascript">alert("El token no es válido");</script>';
                    return view ('iniciar_sesion');
            }
        } else {
            echo '<script language="javascript">alert("No se pudo validar la cuenta. Ingrese un token válido");</script>';
                    return view ('iniciar_sesion');
        }
    }
    
}