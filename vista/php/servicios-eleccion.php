<DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="vista/css/servicios-eleccion.css">
        <title>Servicio °n</title>
    </head>

    <body>
        <?php
        $item = "id_serv_item";
        $valor = $_GET["idItem"];
        $respuesta = ControladorServicios::ctrMostrarItem($item, $valor);
        $respItem = $respuesta[0];
        $separador = "<br>";
        $cadena = $respItem["descripcion"];
        $stringSeparado = explode($separador, $cadena);

        $item2 = "id_servicio";
        $valor2 = $respItem["id_servicio"];
        $respuesta2 = ControladorServicios::ctrMostrarServicio($item2, $valor2);
        ?>
        <div class="contenedor-services-n" id="<?= $respuesta2["id_servicio"] ?>">
            <div class="content-eleccion-servicio-1 content-eleccion-servicio">
                <div class="content-png-imagen-servicio-1">
                    <img id="myImg" src="<?= $respItem['foto'] ?>" alt="<?= $respItem["titulo"] ?>">
                    <img src="vista/imagenes/proyectsandservices/servicios/borde-blogSeleccion.png" alt="">
                </div>
                <div class="agree-label">
                    <div class="services-n-description">
                        <img src="vista/imagenes/proyectsandservices/servicios/ubicacion.png" alt="icono">
                        <p><?= $respItem["lugar"] ?></p>
                    </div>
                    <div class="services-n-description">
                        <img src="vista/imagenes/proyectsandservices/servicios/servicio.png" alt="icono">
                        <p>Servicios</p>
                    </div>
                    <div class="services-n-description">
                        <img src="vista/imagenes/proyectsandservices/servicios/planifica.png" alt="icono">
                        <p><?= $respuesta2["nombre"] ?></p>
                    </div>
                </div>
            </div>
            <div class="content-eleccion-servicio-2 scrollText">
                <h1><?= $respItem["titulo"] ?></h1>
                <?php
                foreach ($stringSeparado as $p) {
                    echo "<p class='parrafoServicio'>" . $p . "</p>";
                }
                ?>
            </div>
            <div class="imgPortadaServicios">

            </div>
            <div id="myModal" class="modal">
            <span class="close" title="Cerrar">&#10006;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
        </div>
    </body>
    <script src='vista/js/imagen-modal-seleccion.js'></script>
    <script src='vista/js/servicio-eleccion.js'></script>

    </html>