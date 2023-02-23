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
        <div class="contenedor-services-n" id="<?=$respuesta2["id_servicio"]?>">
            <div class="content-services-n">
                <div>
                    <div>
                        <img src="vista/imagenes/extras/indeconsult-logo-clasico.png">
                        <p> Categoría <br><?= $respuesta2["nombre"] ?></p>
                        <img src="vista/imagenes/proyectsandservices/servicios/eleccionPortada/servicios-portada-item.jpg" class="portadaItemServicio" alt="“Creación del Servicio de Laboratorios en Biotecnologías para Camélidos Sudamericanos en el CIP la Raya de la Universidad Nacional del Altiplano – Puno, Distrito de Santa Rosa – Provincia de Melgar – Departamento de Puno”" title="“Creación del Servicio de Laboratorios en Biotecnologías para Camélidos Sudamericanos en el CIP la Raya de la Universidad Nacional del Altiplano – Puno, Distrito de Santa Rosa – Provincia de Melgar – Departamento de Puno”">
                    </div>
                </div>
            </div>
            <div class="content-services-n">
                <div class="services-n-description">
                    <span class="icon-location" style="color: #fff; font-size: 40px;"></span>
                    <p>Ubicación: <?=$respItem["lugar"]?></p>
                </div>
                <div class="services-n-description">
                    <img src="vista/imagenes/extras/icono-servicio.png" alt="">
                    <p>Servicios</p>
                </div>
                <div class="services-n-description">
                    <img src="vista/imagenes/extras/icono-planificacion.png" alt="">
                    <p>Servicio / <?= $respuesta2["nombre"] ?></p>
                </div>
            </div>
            <div class="content-services-n content-eleccion-servicio">
                <div>
                    <img id="myImg" src="<?= $respItem['foto'] ?>" alt="<?= $respItem["titulo"] ?>">
                    <div id="myModal" class="modal">
                        <span class="close">x</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                    </div>
                </div>
                <div>
                    <h1><?= $respItem["titulo"] ?></h1>
                    <?php
                    foreach ($stringSeparado as $p) {
                        echo "<p>" . $p . "</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
    <!--<script src="vista/js/imagen-modal-seleccion.js"></script>-->

    </html>