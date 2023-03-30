<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vista/css/servicios.css">
    <title>Servicios</title>
</head>

<body>
    <?php
    if (!isset($_GET["id"]) || $_GET["id"] > 4) {
        echo '<script>
                window.location = "inicio";
            </script>';
        return;
    }
    ?>

    <div class="contenedor-services">

        <?php
        $item = "id_servicio";
        $valor = $_GET["id"];
        $respuesta = ControladorServicios::ctrMostrarServicio($item, $valor);
        $separador = "<br>";
        $cadena = $respuesta["descripcion"];
        $stringSeparado = explode($separador, $cadena);

        $respuesta1 = ControladorServicios::ctrMostrarItem($item, $valor);

        ?>
        <div class="padre-services-1">
            <div class="content-services-1">
                <div class="services">
                    <h1><?= $respuesta["nombre"] ?></h1>
                    <div class="content-p">
                        <?php
                        foreach ($stringSeparado as $parrafo) {
                            echo "<p>" . $parrafo . "</p>";
                        }
                        ?>
                    </div>
                    <h2>Nuestros servicios</h2>
                </div>
                <div class="services">
                    <?php
                    for ($i = 4; $i > 0; $i--) {
                        $itemOther = "id_servicio";
                        $valorOther = $i;
                        $respuestaOther = ControladorServicios::ctrMostrarServicio($itemOther, $valorOther);
                        $idOther = $respuestaOther["id_servicio"];
                        echo "<div class='content-services-plugin'>
                                    <a href='index.php?ruta=servicios&id=$idOther'>
                                        <img src='" . $respuestaOther['portada'] . "' alt=''class='img-plugin'>
                                        <p>" . $respuestaOther["nombre"] . "</p>             
                                    </a>
                                </div>";
                    }
                    ?>
                </div>
            </div>
            <div class="content-services-1-portada">
                <div>
                    <img src="<?= $respuesta["portada"] ?>" alt="">
                </div>
                <img class="imagenService" src="vista/imagenes/proyectsandservices/servicios/service.png">
            </div>
        </div>
        <div class="content-services-2" id="showItemService">
            <div class="title-portafolio-service">
                <h1>Portafolio de Servicios - <?= $respuesta["nombre"] ?></h1>
                <div>
                    <p>Somos especialistas en</p>
                    <p class="p-animation"></p>
                </div>
            </div>
            <?php
            foreach ($respuesta1 as $item) {
                $cadena1 = $item["descripcion"];

                $stringSeparado1 = explode($separador, $cadena1);

                $cad = $stringSeparado1[0];

                $caracteres = 150;

                $cadenaAcortada = substr($cad, 0, $caracteres) . '...';

                $idServItem = $item["id_serv_item"];
            ?>
                <div class="item-eleccion-service">
                    <div>
                        <img src="<?= $respuesta["portada"] ?>" alt="" />
                        <a href="index.php?ruta=servicios-eleccion&idItem=<?= $idServItem ?>" class='button2 servicios-item'>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span class='text'>Ver Proyecto</span>
                        </a>
                    </div>
                    <div>
                        <div>
                            <img src="<?= $item["foto"] ?>" alt="" />
                        </div>
                    </div>
                    <div>
                        <p><?= $item["titulo"] ?></p>
                    </div>
                    <div>
                        <span></span>
                        <p><?= $item["lugar"] ?></p>
                        <span></span>
                        <p><?= $item["estado"] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</body>
<script src="vista/js/servicio.js"></script>

</html>