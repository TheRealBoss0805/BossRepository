<?php
    require_once "conexion.php";

    class ModeloProyectos{
        
        /*MOSTRAR PROYECTOS*/
        
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

        /*MOSTRAR ITEMS DE PROYECTOS*/

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
        static public function mdlMostrar3Item($tabla, $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_proyec_item ASC LIMIT 3");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }

        /*MOSTRAR CATEGORIAS POR CATEGORIAS TIPOS Y SECTORES*/

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

        //MUESTRA LA TABLA DE PROYECTOS 

        static public function mdlMostrarTodoProyectos($tabla){
            if($tabla != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_proyecto ASC");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }

        //MOSTRAR LA GALERÍA RESPECTO A CADA PROYECTO EN ESPECÍFICO

        static public function mldMostrarGaleriaItem($tabla, $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_galery_proy ASC");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt ->execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }
    }
