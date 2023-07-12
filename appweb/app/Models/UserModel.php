<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'usuario';
    protected $allowedFields = ['nombre','email','contrasena','apellido','genero','numtel','fechanacimiento','pagweb','pais','provincia','ciudad','calle','altura','id','token'];

    public function list(){
        $sql = "select * from usuario;";
        $query = $this->db->query($sql);
        $result = $query->getResult();
        return $result;
    }

    public function consultarEmail($email){
        $x=$this->db->table('usuario');
        $resultado= $x->where('email',$email)->get();
        if(count($resultado->getResultArray()) <1){
            return False;
        }else{
            return True;
        }
    }

    public function consultarIniciarSesion($email,$contrasena){
        $x = $this->db->table('usuario');
        $result = $x->where('email', $email)->get()->getFirstRow();
        if($result){
            if (md5($contrasena)===$result->contrasena) {
                echo  ("entro");
                return True;
            } else {
                echo  ("contra mala");
                //return False;
            }
        } else {
            echo ("correo no encontrado");
            return False;
        }
    }

    public function buscarId($email){
        $resultado= $this->where('email',$email)->first();
        if($resultado){
            return $resultado['id'];
        }
    }

    public function buscarUsuario($email){
        $resultado= $this->where('email',$email)->first();
        if($resultado){
            return $resultado;
        }
    }

    public function obtenerPorToken($token)
    {
        return $this->where('token', $token)->first();
    }

    public function actualizar($cuenta)
    {
        $this->update($cuenta['id'], $cuenta);
    }
}