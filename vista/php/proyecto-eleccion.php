<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="vista/css/proyecto-eleccion.css">
<title>Proyecyo Elección</title>

</html>

<body>
    <?php
    $item = "id_proyec_item";
    $valor = $_GET["id"];
    $respuesta = ControladorProyecto::ctrMostrarItem($item, $valor);
    $respItem = $respuesta[0];
    $separador = "<br>";
    $cadena = $respItem["descripcion"];
    $stringSeparado = explode($separador, $cadena);

    $item2 = "id_proy_ts";
    $valor2 = $respItem["id_proy_ts"];
    $respuesta2 = ControladorProyecto::ctrMostrarTipoSector($item2, $valor2);
    $respItem2 = $respuesta2[0];

    $item3 = "id_proyecto";
    $valor3 = $respItem["id_proyecto"];
    $respuesta3 = ControladorProyecto::ctrMostrarProyectoSeccion($item3, $valor3);
    ?>
    <div class="contenedor-eleccion-proyecto" id="<?= $respuesta3["id_proyecto"] ?>">
        <div class="content-eleccion-proyecto">

            <div class="titleCategory">
                <div class="description">
                    <h1><?= $respuesta3["nombre"] ?></h1>
                </div>
                <div class="description">
                    <h2><?= $respItem2["nombre"] ?></h2>
                </div>
                <div class="description">
                    <h3><?= $respItem["titulo"] ?></h3>
                </div>
            </div>
            <!--<span>#Algun disenio de flecha</span>-->
            <div class="content-itemProyecto">
                <img src="<?= $respItem["foto"] ?>" alt="" />
                <div>
                    <?php
                    foreach ($stringSeparado as $p) {
                        echo "<p>" . $p . "</p>";
                    }
                    ?>
                </div>
            </div>

        </div>
        <div class="content-eleccion-proyecto">
            <div class="galeryItem">
                <div class="child-itemProyecto contentItemGalery">

                    <?php
                    $respuestaGalery = ControladorProyecto::ctrMostrarGaleriaItem($item, $valor);
                    $i = 1;
                    foreach ($respuestaGalery as $itemGalery) {

                        echo "<span class='electionItem' valor='" . $i . "'>
                                <p class='pItem'>item: " . $i . "</p>
                                <i class='fi fi-sr-picture'></i>
                                <img class='tagItem' src='vista/imagenes/proyectsandservices/proyectos/ejemploGaleriaProyecto/etiquetacerrada.png'>
                              </span>";
                        $i++;
                    }
                    ?>
                </div>

                <div class="child-itemProyecto .child2">
                    <?php
                    $j = 0;
                    foreach ($respuestaGalery as $itemGalery) {
                        echo "<div class='itemGalery activate' valor='" . $j . "'>
                                <img src='" . $itemGalery["foto"] . "' alt=''>
                                <h3>" . $itemGalery["descripcion"] . "</h3>
                            </div>";
                        $j++;
                    }
                    ?>
                </div>
            </div>
            <div class="descriptionGalery">
                <p>IMÁGENES RELACIONADAS AL PROYECTO</p>
            </div>
        </div>
        <div class="imgPortadaProyecto">
        </div>
    </div>
</body>
<!--<script src='vista/js/imagen-modal-seleccion.js'></script>-->
<script src='vista/js/proyectoEleccion.js'></script>