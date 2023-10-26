

<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true"); 

require_once('../config/database.php');


class producto
{
    private $base;

    public function __construct() {
        $this->base = new Database();
        
    }

    public function getProductos()
    {
        try {
            $query = "SELECT * FROM productos";
            $productos = $this->base->mostrarProductos($query);

            $productosjson = json_encode($productos);
           
            echo $productosjson;
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