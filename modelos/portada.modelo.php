
<?php
    require_once "conexion.php";
    
    class ModeloPortada{
        /*==========TRAER LOS ÚTLIMOS 8 ITEMS DE LA PORTADA===========*/
        
        static public function mdlMostrar8Portadas($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_portada ASC LIMIT 8");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
            $stmt = null;
        }
    }
?>
