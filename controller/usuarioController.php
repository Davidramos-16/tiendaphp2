<?php
require_once('../config/database.php');
require_once('../model/usuario.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
   $input = file_get_contents('php://input');
   $dt = var_dump(json_decode($input));
   $data = json_decode($input, true);
   $correo = $data['email'];
   $pass = $data['pass'];
   if (isset($data['email']) || isset($data['pass'])) {
      $usuario = new usuarioController();
      
      $usuario->verificarUsuario($correo,$pass);
   } else{
      echo json_encode("Formulario vacio ");
   }
  }
   else
   {
      echo json_encode("No se ha enviado una solicitud POST");
   }
?>