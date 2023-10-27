<?php
require_once('../config/database.php');
require_once('../model/usuario.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
  
   //if($_POST)
   //{
      $usuario = new usuarioController();
      $correo = 'chicas@mail.com';//$_POST['email'];
      $pass = 'test';//$_POST['pass'];
      $usuario->verificarUsuario($correo,$pass);

   //}
   /*else
   {
      echo "No se ha enviado una solicitud POST";
   }*/
?>