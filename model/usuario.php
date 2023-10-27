<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
require_once('../config/database.php');

class usuarioController
{
    private $base;

    public function __construct() {
        $this->base = new Database();
        
    }

    ///verificamos credenciales
    public function verificarUsuario($correo,$pass) {
        
        try {
            $query = "SELECT * FROM usuarios where email='$correo' and pass='$pass'";
            $usuarios = $this->base->login($query);

            
           
                if(!($usuarios) == null)
                {
                    $usuariosjson = json_encode($usuarios);
                    echo "Se ha autenticado correctamente";

                    $token = bin2hex(random_bytes(32));
                    
                    //header("Location:".'../view/principal.html');
                   echo $usuariosjson.'<br>';
                    echo $token;
                }
                else
                {
                    header("Location:".'../view/login.html');
                    echo "credenciales invalidas";
                }
            
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    public function registrarUsuario($nombre,$apellido,$email,$pass,$direccion)
    {
       try
       {
        $query = "INSERT INTO usuarios(nombre,apellido,email,pass,direccion) values('$nombre','$apellido','$email','$pass','$direccion')";
        $usuarios = $this->base->login($query);

        //$usuariosjson = json_encode($usuarios);
       header("Location:".'../view/login.html');
       }
       catch(PDOException $e)
       {
        die("Error al insertar: " . $e->getMessage());
       }
    }

    public function actualizarUsuario($nombre,$apellido,$email,$pass,$imagen,$id,$direccion)
    {
        try
       {
        $query = "update usuarios set nombre='$nombre',apellido='$apellido', email='$email',pass='$pass',imagen='$imagen',direccion='$direccion' where id='$id'";
        $usuarios = $this->base->login($query);

        //$usuariosjson = json_encode($usuarios);
       header("Location:".'../view/principal.html');
       }
       catch(PDOException $e)
       {
        die("Error al actualizar: " . $e->getMessage());
       }

    }
}

?>