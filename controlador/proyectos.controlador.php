<?php
    class ControladorProyecto{
        static public function ctrMostrarProyectoSeccion($item, $valor){
            /*MOSTRAR INFO DE POR TIPO O POR SECTOR*/
            $tabla = "proyectos";
            $respuesta = ModeloProyectos::mdlMostrarProyectoSeccion($tabla, $item, $valor);
            return $respuesta;
        }
        static public function ctrMostrarTipoSector($item, $valor){
            /*MOSTRAR LOS FILTRO DE QUE HAY POR SECTO O POR TIPO*/
            $tabla = "proy_tipo_sector";
            $respuesta = ModeloProyectos::mdlMostrarTipoSector($tabla, $item, $valor);
            return $respuesta;
        }
            /*MOSTRAR LOS ITEMS */
        static public function ctrMostrarItem($item, $valor){
            $tabla = "proyec_items";
            $respuesta = ModeloProyectos::mdlMostrarItem($tabla, $item, $valor);
            return $respuesta;
        }

    }
?>