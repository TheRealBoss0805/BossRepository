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
    ?>
    <div class="contenedor-eleccion-proyecto">
        <div class="content-eleccion-proyecto">
            <p>lorem quartium larala nomequitiuom re</p>
            <img src="vista/imagenes/extras/img-1.png" alt="">
        </div>
        <div class="content-eleccion-proyecto">
            <div>
                <img id="myImg" src="vista/imagenes/extras/img-1.png" alt="<?=$respItem["titulo"]?>">
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