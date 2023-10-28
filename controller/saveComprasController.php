<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
require_once('../model/compras.php');



$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->idProducto) && isset($data->idUsuario)&& isset($data->cantidad))
{
    $producto= $data->idProducto;
    $usuario = $data->idUsuario;
    $cantidad = $data->cantidad;
    $insert = new compras();

    $insert ->saveCompras($producto,$usuario,$cantidad);
}





?>