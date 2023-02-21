<?php
    class ControladorServicios{
        static public function ctrMostrarServicio($item, $valor){
            /*MOSTRAR TODOS LOS SERVICIOS*/
        
            $tabla = "servicios";
            $respuesta = ModeloServicios::mdlMostrarServicio($tabla, $item, $valor);
            return $respuesta;
        }
        static public function ctrMostrarItem($item, $valor){
            /*MOSTRAR ÍTEMS*/
            $tabla = "serv_items";
            $respuesta = ModeloServicios::mdlMostrarItem($tabla, $item, $valor);
            return $respuesta;
        }
        static public function ctrMostrarTodoServicios(){
            $tabla = "servicios";
            $respuesta = ModeloServicios::mdlMostrarTodoServicios($tabla);
            return $respuesta;
        }

}
?>