
<?php

    class ControladorPortada{

        static public function ctrMostrar8Portadas(){
            $tabla = "portada";
            $respuesta = ModeloPortada::mdlMostrar8Portadas($tabla);
            return $respuesta;
        }
    }

?>