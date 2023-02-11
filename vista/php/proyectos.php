<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vista/css/proyecto.css">
    <title>Proyecto por n</title>
</head>

<body>
    <?php
        if(!isset($_GET["id"]) || $_GET["id"] > 2){
            echo '<script>
            window.location = "inicio";
            </script>';
            return;
        }

        $item = "id_proyecto";
        $valor = $_GET["id"];
        $respuesta = ControladorProyecto::ctrMostrarProyectoSeccion($item, $valor);
    ?>
    <div class="contenedor-proyecto">
        <div class="content-proyecto">
            <img src="vista/imagenes/extras/img-1.png" alt="">
            <p><?=$respuesta["descripcion"]?></p>
        </div>
        <div class="content-proyecto">
            <div>
                <p>Portafolio de Proyectos por <?=$respuesta["nombre"]?></p>
            </div>
            <?php
            /*TRAEMO LOS DATOS PARA LOS FILTROS POR TIPO O SECTOR*/
            $item1 = "id_proyecto";
            $valor1 = $_GET["id"];
            $respuesta1 = ControladorProyecto::ctrMostrarTipoSector($item1, $valor1);
            $clase = ($_GET["id"] == 2)? 'sector-style':'';
            echo "<div class='".$clase."'>
            <a class='fancy btnTodos active' idCategoria='".$_GET["id"]."'>
                <span class='top-key'></span>
                <span class='text'>Todos</span>
                <span class='bottom-key-1'></span>
                <span class='bottom-key-2'></span>
            </a>";

            foreach($respuesta1 as $tipo){
                echo"
                <a class='fancy btnFiltro' idFiltro='".$tipo["id_proy_ts"]."' idCategoria='".$tipo["id_proyecto"]."'>
                <span class='top-key'></span>
                <span class='text'>".$tipo["nombre"]."</span>
                <span class='bottom-key-1'></span>
                <span class='bottom-key-2'></span>
            </a>";
            }
                ?>
        </div>
        <form class="buscador-tipo-2">
            <label>Búsqueda:</label>
            <input type="text" placeholder="Proyectos" id="buscador" name="buscador">
            <!--<input type="submit" value="Buscar" name ="btnBuscador">-->
        </form>
    </div>
    <?php
        $item2 = "id_proyecto";
        $valor2 = $_GET["id"];
        $respuesta2 = ControladorProyecto::ctrMostrarItem($item2, $valor2);
        echo "<div class='content-proyecto' id='items'>";

        foreach($respuesta2 as $item2){
     ?>
    <div class="parent-button-div">
        <img src="<?=$item2["foto"]?>">
        <div class="button-div">
            <a class="c-button c-button--gooey"
                href="index.php?ruta=proyecto-eleccion&id=<?=$item2["id_proyec_item"]?>"> Más info.
                <div class="c-button__blobs">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </a>
            <svg style="display: block; height: 0; width: 0;" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <filter id="goo">
                        <feGaussianBlur result="blur" stdDeviation="10" in="SourceGraphic"></feGaussianBlur>
                        <feColorMatrix result="goo" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" mode="matrix"
                            in="blur"></feColorMatrix>
                        <feBlend in2="goo" in="SourceGraphic"></feBlend>
                    </filter>
                </defs>
            </svg>
        </div>
        <div class="buttons-div-2">
            <p class="articulo"><?=$item2["titulo"]?></p>
        </div>
    </div>
    <?php
        }
        echo "</div>";
    ?>
    </div>
</body>

</html>