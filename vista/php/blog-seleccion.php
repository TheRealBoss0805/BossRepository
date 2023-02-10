<!--falta trabajar-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vista/css/blog-seleccion.css">
    <title>blog-selección</title>
</head>

<body>
    <?php
    $item = "id_blog_pub";
    $valor = $_GET["id"];

    $item = null;
    $valor = null;

    $respuesta = ControladorBlog::ctrMostrarPublicaciones($item, $valor ,$item2, $valor2);
    ?>
    <div class="contenedor-blog-seleccion">
        <div class="content-blog-seleccion">
            <div>
                <img src="vista/imagenes/extras/img-1.png">
            </div>
        </div>
        <div class="content-blog-seleccion">
            <p><?= $respuesta["titulo"]?></p>
            <p><?= $respuesta["autor"]?>, fecha, 
            <?php
            $item2="id_blog_pub";
            $valor2=$respuesta["id_blog_pub"];
            $respuesta2 = ControladorBlog::ctrTraerIdCategoria($item2,$valor2);

            foreach($respuesta2 as $i => $categoria){
                $item3="id_blog_cat";
                $valor3 = $categoria["id_blog_cat"];
                $respuesta3 = ControladorBlog::ctrTraerCategoria($item3, $valor3);
                echo $respuesta3["nombre"];
                $posicion = count($respuesta2)-1;
                if($i != $posicion){
                    echo " - ";   
                }
            }
            ?>
            </p>
            <p><?= $respuesta["descripcion"]?>
            </p>
            <div>
                <img src="vista/imagenes/blog/titulo-blog-seleccion.png" alt="">
                <h1>Nuestros Proyectos</h1>
            </div>
        </div>
        <div class="content-blog-seleccion">
            <div class="div-blog-seleccion">
                <img id="myImg" src="vista/imagenes/extras/img-1.png" alt="Imagen Seleccionada">
                <div id="myModal" class="modal">
                    <span class="close">x</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>