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
    <div class="contenedor-eleccion-proyecto" id="<?=$respuesta3["id_proyecto"]?>">
        <div class="content-eleccion-proyecto">
            <h1><?=$respItem2["nombre"]?></h1>
            <h2><?=$respItem["titulo"]?></h2>
            <span></span>
        </div>
        <div class="content-eleccion-proyecto">
            <div>
                <h1>Sobre Nuestro Proyecto</h1>
                <?php
                    foreach($stringSeparado as $p){
                            echo "<p>".$p."</p>";
                    }
                ?>
                <img class="servPng1" src="vista/imagenes/proyectsandservices/proyectos/pngServiciosItem.png" alt="">
                <img class="servPng2" src="vista/imagenes/proyectsandservices/proyectos/pngServiciosItem.png" alt="">
            </div>
            <div>
                <img src="<?=$respItem["foto"]?>" alt="">
            </div>
            <div class="pngPortada">
            
            </div>
        </div>
    </div>
</body>
<script src='vista/js/imagen-modal-seleccion.js'></script>