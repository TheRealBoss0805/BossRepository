<?php
    class ControladorBlog{
        
        static public function ctrMostrarPublicaciones($item, $item2, $valor, $valor2){

            /*MOSTRAR TTODAS LAS PUBLICACIONES*/

            $tabla = "blog_publicaciones";
            $respuesta = ModeloBlog::mdlMostrarPublicaciones($tabla, $item, $item2, $valor, $valor2);
            return $respuesta;
        }
        static public function ctrMostrar2Publicaciones(){

            /*MOSTRAR SOLO 2 REGISTROS*/

            $tabla = "blog_publicaciones";
            $respuesta = ModeloBlog::mdlMostrar2Publicaciones($tabla);
            return $respuesta;
        }
        static public function ctrTraerIdCategoria($item, $valor){

            /*MOSTRAR PUBLICACIONES POR CATEGORIA*/

            $tabla = "blog_pub_cat";
            $respuesta = ModeloBlog::mdlTraerIdCategoria($tabla, $item, $valor);
            return $respuesta;
        }
            /*MOSTRAR LOS ITEMS */

        static public function ctrTraerCategoria($item, $valor){
            $tabla = "blog_categor";
            $respuesta = ModeloBlog::mdlTraerCategoria($tabla, $item, $valor);
            return $respuesta;
        }

        static public function ctrTraerTipoZona($item, $valor){
            $tabla = "blog_tipo_zona";
            $respuesta = ModeloBlog::mdlTraerTipoZona($tabla, $item, $valor);
            return $respuesta;
        }
        static public function ctrTraerPubFiltrado($item,$item2, $valor, $valor2){
            $tabla = "blog_publicaciones";
            //$respuesta = ModeloBlog::mdlTraerPub($item,$item2, $valor, $valor2);
            //return $respuesta;
        }
    }
?>