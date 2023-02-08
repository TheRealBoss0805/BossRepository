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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae aspernatur tempore eius? Architecto
                libero mollitia atque animi maiores voluptatum. Beatae amet, quo eos magnam obcaecati nihil ratione
                dolor ut eligendi?</p>
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
        <form action="" class="buscador-tipo-2">
            <input type="search" placeholder="Buscar...">
            <input type="submit" value="Buscar">
        </form>
    </div>
    <?php
        $item2 = "id_proyecto";
        $valor2 = $_GET["id"];
        $respuesta2 = ControladorProyecto::ctrMostrarItem($item2, $valor2);
        echo " <div class='content-proyecto' id='items'>";

        foreach($respuesta2 as $item){
     ?>
    <div class="parent-button-div">
        <img src="vista/imagenes/extras/img-1.png" alt="">
        <div class="button-div">
            <!--<a href="">Más info.</a>-->
            <a class="c-button c-button--gooey" href="index.php?ruta=proyecto-eleccion&id=<?=$item["id_proyec_item"]?>"> Más info.
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
            <p><?=$item["titulo"]?></p>
        </div>
    </div>
    <?php
        }
        echo "</div>";
    ?>
    </div>
</body>

</html>