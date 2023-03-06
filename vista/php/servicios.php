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
                    <h2>Nuestros servicios</h2>
                    <h1><?= $respuesta["nombre"] ?></h1>
                    <div class="content-p">
                        <?php
                        foreach ($stringSeparado as $parrafo) {
                            echo "<p>" . $parrafo . "</p>";
                        }
                        ?>
                    </div>
                    <!--<h2>Conoce Nuestros Proyectos</h2>-->
                </div>
            </div>
            <div class="content-services-1-portada">

                <div>
                    <img src="<?= $respuesta["portada"] ?>" alt="">
                </div>
                <img class="imagenService" src="vista/imagenes/proyectsandservices/servicios/service.png">
            </div>
        </div>
        <div class="selectionRegionStatus">
            <h2>Conoce Nuestros Proyectos</h2>
            <div class="services">
                <ul>
                    <li>
                        <select id="ubicacionServicio" required>
                            <?php
                            $array = array();
                            $i = -1;
                            foreach ($respuesta1 as $item2) {
                                $i++;
                                $array[$i] = $item2["lugar"];
                            }
                            $duplicado = array_unique($array);
                            sort($duplicado);
                            echo   "<option value='Ubicación'>Ubicación</option>";
                            foreach ($duplicado as $arregloAlfa) {
                                echo "<option value='" . $arregloAlfa . "'>" . $arregloAlfa . "</option>";
                            }
                            ?>
                        </select>
                    </li>
                    <li>
                        <select id="estadoServicio" required>
                            <option value="Estado">Estado</option>
                            <option value="en proceso">en proceso</option>
                            <option value="culminado">culminado</option>
                        </select>
                    </li>
                    <li>
                        <button type="button" id="botonServicio">Mostrando todos los proyectos</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-services-2" id="showItemService">
            <?php
            echo "<p class='nothingItem' style='display:none'>¡No se han encontrado Proyectos!</p>";
            foreach ($respuesta1 as $item) {
                $cadena1 = $item["descripcion"];

                $stringSeparado1 = explode($separador, $cadena1);

                $cad = $stringSeparado1[0];

                $caracteres = 150;

                $cadenaAcortada = substr($cad, 0, $caracteres) . '...';

                $idServItem = $item["id_serv_item"];

                echo "
                    <div class='services'>
                    <input type='hidden' class='item' valor='" . $item["lugar"] . "' valor2='" . $item["estado"] . "'>
                        <div class='services-1'>
        
                            <div>
                                <p>" . $item["titulo"] . "</p>
                            </div>
            
                            <div>
                                <p>" . $cadenaAcortada . "</p>
                            </div>
                            <div>
                                <a href='index.php?ruta=servicios-eleccion&idItem=$idServItem' class='button2 servicios-item'>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span class='text'>Ver Proyecto</span>
                                </a>
                            </div>
                        </div>
                        <div class='services-2'>
                            <img src='" . $item["foto"] . "' alt''>
                        </div>
                    </div>";
            }
            ?>
        </div>

    </div>
</body>
<script src="vista/js/servicio.js"></script>

</html>