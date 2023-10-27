<?php
require_once('../config/database.php');
require_once('../model/usuario.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
  
if (isset($_POST['email']) && isset($_POST['pass'])) {
      $usuario = new usuarioController();
      $correo = $_POST['email'];
      $pass = $_POST['pass'];
      $usuario->verificarUsuario($correo,$pass);

   }
   else
   {
      echo json_encode("No se ha enviado una solicitud POST");
   }
?>