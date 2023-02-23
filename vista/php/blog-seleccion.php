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

    $respuesta = ControladorBlog::ctrMostrar1Publicacion($item, $valor);
    $anio = date("Y", strtotime($respuesta["fecha"]));
    $dia = date("d", strtotime($respuesta["fecha"]));
    $mes = date("m", strtotime($respuesta["fecha"]));
    
    echo "<div class='contenedor-blog-seleccion'>
        <div class='content-blog-seleccion'>
            <div>
                <p>";
                $valor2 = $respuesta["id_blog_pub"];
                $respuesta2 = ControladorBlog::ctrTraerIdCategoria($item, $valor2);
                    echo "Categoría <br>";
                foreach ($respuesta2 as $i => $categoria) {
                    $item2 = "id_blog_cat";
                    $valor3 = $categoria["id_blog_cat"];
                    $respuesta3 = ControladorBlog::ctrTraerCategoria($item2, $valor3);
                    echo $respuesta3["nombre"];
                    $posicion = count($respuesta2) - 1;
                    if ($i != $posicion) {
                        echo " - ";
                    }
                }
                echo  "</p>";
                ?>
                <img src="vista/imagenes/proyectsandservices/blog/portadaItems/1.jpg">
            </div>
        </div>
        <div class="content-blog-seleccion">
            <p><?= $respuesta["titulo"] ?></p>
            <p>Publicado por <?= $respuesta["autor"] ?>/ <?= $dia . "-" . $mes . "-" . $anio ?>/
                <?php
                $item2 = "id_blog_pub";
                $valor2 = $respuesta["id_blog_pub"];
                $respuesta2 = ControladorBlog::ctrTraerIdCategoria($item2, $valor2);

                foreach ($respuesta2 as $i => $categoria) {
                    $item3 = "id_blog_cat";
                    $valor3 = $categoria["id_blog_cat"];
                    $respuesta3 = ControladorBlog::ctrTraerCategoria($item3, $valor3);
                    echo $respuesta3["nombre"];
                    $posicion = count($respuesta2) - 1;
                    if ($i != $posicion) {
                        echo " - ";
                    }
                }
                ?>
            </p>
            <p><?= $respuesta["descripcion"] ?></p>
        </div>
        <div class="content-blog-seleccion">
            <div class="div-blog-seleccion">
                <img id="myImg" src="<?= $respuesta["imagen"] ?>" alt="Imagen Seleccionada">
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