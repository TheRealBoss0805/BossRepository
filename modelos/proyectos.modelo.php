<?php
    require_once "conexion.php";

    class ModeloProyectos{
        /*MOSTRAR INFO DE POR TIPO O POR SECTOR*/
        
        static public function mdlMostrarProyectoSeccion($tabla, $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_proyecto ASC");
                $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt ->execute();
                return $stmt ->fetch();
            }
            $stmt ->close();
            $stmt = null;
        }

        /*MOSTRAR LOS ITEMS*/
        static public function mdlMostrarItem($tabla, $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_proyec_item ASC");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }

        /*MOSTRAR LOS FILTRO DE QUE HAY POR SECTO O POR TIPO*/
        static public function mdlMostrarTipoSector($tabla, $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_proy_ts ASC");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }
    }

?>