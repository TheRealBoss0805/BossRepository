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

    echo "<div class='contenedor-blog-seleccion'>";
    ?>
    <div class="content-blog-seleccion cambioContent">
        <p>Categoría</p>
        <p>
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
        <p><?= $dia . " / " . $mes . " / " . $anio ?></p>
    </div>
    <div class="content-blog-seleccion cambioCaracter">
        <div class="div-blog-seleccion">
            <img id="myImg" src="<?= $respuesta["imagen"] ?>" alt="<?= $respuesta["titulo"] ?>">
        </div>

        <div class="div-blog-seleccion-contenido">
            <p><?= $respuesta["titulo"] ?></p>
            <p class="descriptionBlogSelection"><?= $respuesta["descripcion"] ?></p>
        </div>

    </div>
    <div class="imgPortadaBlog">
    </div>
    <div id="myModal" class="modal">
        <span class="close" title="Cerrar">&#10006;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    </div>
</body>
<script src='vista/js/imagen-modal-seleccion.js'></script>
<script src='vista/js/blog-seleccion.js'></script>

</html>