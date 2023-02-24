<?php
    class ControladorBlog{
        
        static public function ctrMostrarPublicaciones($item, $item2, $valor, $valor2, $empezar_desde, $tamanio_pagina){

            /*MOSTRAR TTODAS LAS PUBLICACIONES*/

            $tabla = "blog_publicaciones";
            $respuesta = ModeloBlog::mdlMostrarPublicaciones($tabla, $item, $item2, $valor, $valor2, $empezar_desde, $tamanio_pagina);
            return $respuesta;
        }
        static public function ctrContarPublicaciones($item, $valor, $item2, $valor2){

            /*TRAER LA CANTIDAD DE PUBLICACIONES*/

            $tabla = "blog_publicaciones";
            $respuesta = ModeloBlog::mdlContarPublicaciones($tabla, $item, $valor, $item2, $valor2);
            return $respuesta;
        }
        static public function ctrMostrar2Publicaciones(){

            /*MOSTRAR SOLO 2 REGISTROS*/

            $tabla = "blog_publicaciones";
            $respuesta = ModeloBlog::mdlMostrar2Publicaciones($tabla);
            return $respuesta;
        }
        static public function ctrMostrar3Publicaciones($item, $valor){

            /*MOSTRAR SOLO 3 REGISTROS*/

            $tabla = "blog_publicaciones";
            $respuesta = ModeloBlog::mdlMostrar3Publicaciones($tabla, $item, $valor);
            return $respuesta;
        }
        static public function ctrMostrar1Publicacion($item, $valor){
            /*MOSTRAR SOLO 1 REGISTRO*/
            $tabla = "blog_publicaciones";
            $respuesta = ModeloBlog::mdlMostrar1Publicacion($tabla, $item, $valor);
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