<?php
    require_once "conexion.php";
class ModeloServicios{

    /*MOSTRAR SERVICIOS*/

    static public function mdlMostrarServicio($tabla, $item, $valor ){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_servicio ASC");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }
        $stmt -> close();
        $stmt = null;
    }

    /*MOSTRAR ITEMS DE SERVICIO*/
    static public function mdlMostrarItem($tabla, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_servicio ASC");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }
}


?>