<?php
require_once "conexion.php";

class ModeloBlog
{

    /*==================================MOSTRAR TODAS LAS PUBLICACIONES================================================*/

    static public function mdlMostrarPublicaciones($tabla, $item, $item2, $valor, $valor2, $empezar_desde, $tamanio_pagina)
    {
        if ($valor == null && $valor2 == null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_blog_pub ASC LIMIT $empezar_desde, $tamanio_pagina");
            $stmt->execute();
            return $stmt->fetchAll();
        } else if ($valor == null &&  $valor2 != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM blog_publicaciones WHERE EXTRACT(YEAR FROM $item2)=:$item2 LIMIT $empezar_desde, $tamanio_pagina");
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else if ($valor != null &&  $valor2 == null) {

            //HACEMOS UN JOIN DE AMBAS TABLAS

            $stmt = Conexion::conectar()->prepare("SELECT * FROM blog_pub_cat pc JOIN blog_publicaciones p ON pc.id_blog_pub = p.id_blog_pub WHERE $item = :$item LIMIT $empezar_desde, $tamanio_pagina");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            //$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            //SELECT * FROM blog_publicaciones WHERE EXTRACT(YEAR FROM fecha)=2023;
            $stmt = Conexion::conectar()->prepare("SELECT * FROM blog_pub_cat pc JOIN blog_publicaciones p ON pc.id_blog_pub = p.id_blog_pub WHERE $item = :$item AND EXTRACT(YEAR FROM $item2)=:$item2 LIMIT $empezar_desde, $tamanio_pagina");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }
//===============CONTABILIZA LAS PUBLICACIONES PARA EL TOTAL DE PAGINACION
    static public function mdlContarPublicaciones($tabla, $item, $valor, $item2, $valor2)
    {
        if ($valor == null && $valor2 == null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_blog_pub ASC");
            $stmt->execute(array());
            return $stmt->rowCount();
            $stmt->closeCursor();
        } else if ($valor == null &&  $valor2 != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM blog_publicaciones WHERE EXTRACT(YEAR FROM $item2)=:$item2");
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
            $stmt->closeCursor();
        } else if ($valor != null &&  $valor2 == null) {

            //HACEMOS UN JOIN DE AMBAS TABLAS

            $stmt = Conexion::conectar()->prepare("SELECT * FROM blog_pub_cat pc JOIN blog_publicaciones p ON pc.id_blog_pub = p.id_blog_pub WHERE $item = :$item");
            $stmt->bindParam(":". $item, $valor, PDO::PARAM_STR);
            //$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
            $stmt->closeCursor();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM blog_pub_cat pc JOIN blog_publicaciones p ON pc.id_blog_pub = p.id_blog_pub WHERE $item = :$item AND EXTRACT(YEAR FROM $item2)=:$item2");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
            $stmt->closeCursor();
        }
        
        $stmt->close();
        $stmt = null;
    }

    /*==========================MOSTRAR SOLO 2 PUBLICACIONES PARA LA SECCION DE PUBLICACIONES RECIENTES===============================*/

    static public function mdlMostrar2Publicaciones($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_blog_pub ASC LIMIT 2");
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }
//=================================MOSTRAR UNA SOLA PUBLICACION EN ESPECIFICO PARA BLOG-SELECCION
    static public function mdlMostrar1Publicacion($tabla, $item, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt ->execute();
        return $stmt ->fetch();
    
        $stmt ->close();
        $stmt = null;
    }
    /*=====================================MOSTRAR LOS ITEMS========================================*/

    static public function mdlTraerIdCategoria($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlTraerCategoria($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_blog_cat ASC");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
        $stmt->close();
        $stmt = null;
    }

    /*=========================================MOSTRAR SI ES INTERNO O EXTERNO===================================*/

    static public function mdlTraerTipoZona($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
        $stmt->close();
        $stmt = null;
    }

    /*==================================MOSTRAR LOS FILTRO DE QUE HAY POR SECTO O POR TIPO=======================================*/

    static public function mdlTraerPubFiltrado($tabla, $item, $item2, $valor, $valor2)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
        $stmt->close();
        $stmt = null;
    }
}
