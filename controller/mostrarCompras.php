<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
require_once('../model/compras.php');

$mCompras = new compras();


    $id_ = 1;
    $mCompras = new compras();
    $mCompras->getCompras($id_);



?>