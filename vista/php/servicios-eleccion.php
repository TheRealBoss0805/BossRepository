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
        $separador ="<br>";
        $cadena = $respItem["descripcion"];
        $stringSeparado = explode($separador, $cadena);
    ?>
        <div class="contenedor-services-n">

            <div class="content-services-n">
                <div>
                    <p><?=$respItem["titulo"]?></p>
                    <img src="<?=$respItem['foto']?>" alt="">
                </div>
            </div>

            <div class="content-services-n">
                <div class="services-n-description">
                    <span class="icon-location" style="color: #fff; font-size: 40px;"></span>
                    <p>Lugar</p>
                </div>
                <div class="services-n-description">
                    <img src="vista/imagenes/extras/icono-servicio.png" alt="">
                    <p>Servicios</p>
                </div>
                <div class="services-n-description">
                    <img src="vista/imagenes/extras/icono-planificacion.png" alt="">
                    <p>Service - categoría</p>
                </div>
            </div>

            <div class="content-services-n">
                <div>
                    <img id="myImg" src="<?=$respItem['foto']?>" alt="Imagen Seleccionada">
                    <div id="myModal" class="modal">
                        <span class="close">x</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                    </div>
                </div>
                <div>
                    <h1>sobre el proyecto</h1>
                    
                    <?php
                        foreach($stringSeparado as $p){
                            echo "<p>".$p."</p>";
                        }
                    ?>
                    
                </div>
            </div>

        </div>
    </body>
    <!--<script src="vista/js/imagen-modal-seleccion.js"></script>-->
    </html>