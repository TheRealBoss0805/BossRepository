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
            <p>Categoría <br> <?=$respItem2["nombre"]?></p>
            <img src="vista/imagenes/proyectsandservices/proyectos/portadaParaItem/1.jpg" alt="CREACIÓN DEL SERVICIO DE ALTA COMPETENCIA DE GIMNASIA EN EL MALECÓN PÉREZ ARANIBAR, DISTRITO DE SAN ISIDRO, PROVINCIA Y REGIÓN DE LIMA" title="CREACIÓN DEL SERVICIO DE ALTA COMPETENCIA DE GIMNASIA EN EL MALECÓN PÉREZ ARANIBAR, DISTRITO DE SAN ISIDRO, PROVINCIA Y REGIÓN DE LIMA">
        </div>

        <div class="content-eleccion-proyecto">
            <div>
                <img id="myImg" src="<?=$respItem["foto"]?>" alt="<?=$respItem["titulo"]?>">
                <div id="myModal" class="modal">
                    <span class="close">x</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>
            <div>
                <h1><?=$respItem["titulo"]?></h1>
                <span class="linea-span"></span>
                <?php
                    foreach($stringSeparado as $p){
                            echo "<p>".$p."</p>";
                    }
                ?>
            </div>
        </div>
    </div>

</body>