<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");

require_once('../config/database.php');

class compras
{
    private $base;

    public function __construct() {
        $this->base = new Database();
        
    }

    public function getCompras($id)
    {

        try {
            $query = "call obtenerCompras('$id')";
            $compras = $this->base->mostrarCompras($query);

            $comprasjson = json_encode($compras);
           
            echo $comprasjson;
           
                /*foreach($productos  AS $producto)
                {
                    echo 'NOMBRE:'.$producto['nombre'].' DESCRIPCION:'.$producto['descripcion'].' PRECIO:$'.$producto['precio'].'<br>';
                }*/
            
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }
}

?>