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
            <div class="content-services">
                <img src="" alt="">
                <p>Nuestros Servicios</p>
            </div>
            <div class="content-services">
                <p><?= $respuesta2["nombre"] ?></p>
            </div>
            <div class="content-services">
                <p class="service-title"><?= $respItem["titulo"] ?></p>
                <div class="services-img">
                    <img src="" alt="">
                </div>
                <div class="services-concept">
                    <div class="parrafoServicio">
                        <?php
                        foreach ($stringSeparado as $p) {
                            echo "<p>" . $p . "</p>";
                        }
                        ?>
                    </div>
                    <span>
                        <div>
                            <img src="vista/imagenes/proyectsandservices/servicios/servicio.png" alt="icono">
                            <p style="color: #fff">Servicio</p>
                        </div>
                    </span>
                    <p><?= $respuesta2["nombre"] ?></p>
                    <span>
                        <div>
                            <img src="vista/imagenes/proyectsandservices/servicios/ubicacion.png" alt="icono">
                            <p style="color: #fff">Ámbito Geográfico</p>
                        </div>
                    </span>
                    <p><?= $respItem["lugar"] ?></p>
                </div>
            </div>
        </div>
    </body>
    <script src='vista/js/imagen-modal-seleccion.js'></script>
    <script src='vista/js/servicio-eleccion.js'></script>

    </html>