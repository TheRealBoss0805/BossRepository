<?php
    class ControladorProyecto{
        static public function ctrMostrarProyectoSeccion($item, $valor){
            /*MOSTRAR TODOS LOS PROYECTOS*/
            $tabla = "proyectos";
            $respuesta = ModeloProyectos::mdlMostrarProyectoSeccion($tabla, $item, $valor);
            return $respuesta;
        }
        static public function ctrMostrarTipoSector($item, $valor){
            /*MOSTRAR LOS PROYECTOS POR TIPO Y SECTOR*/
            $tabla = "proy_tipo_sector";
            $respuesta = ModeloProyectos::mdlMostrarTipoSector($tabla, $item, $valor);
            return $respuesta;
        }
        static public function ctrMostrarItem($item, $valor){
            $tabla = "proyec_items";
            $respuesta = ModeloProyectos::mdlMostrarItem($tabla, $item, $valor);
            return $respuesta;
        }
                // MOSTRAR TODA LA TABLA PROYECTOS
                static public function ctrMostrarTodoProyectos(){
                    $tabla = "proyectos";
                    $respuesta = ModeloProyectos::mdlMostrarTodoProyectos($tabla);
                    return $respuesta;
                }
    }
