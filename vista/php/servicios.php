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
                <h2>Conoce Nuestros Proyectos</h2>
            </div>
            <div class="services">
                <ul>
                    <li>
                        <select name="" id="" required>
                            <option value="">Ubicación</option>
                            <option value="">Amazonas</option>
                            <option value="">Áncash</option>
                            <option value="">Apurímac</option>
                            <option value="">Arequipa</option>
                            <option value="">Ayacucho</option>
                            <option value="">Cajamarca</option>
                            <option value="">Callao</option>
                            <option value="">Cusco</option>
                            <option value="">Huancavelica</option>
                            <option value="">Huánuco</option>
                            <option value="">Ica</option>
                            <option value="">Junín</option>
                            <option value="">La Libertad</option>
                            <option value="">Lambayeque</option>
                            <option value="">Lima</option>
                            <option value="">Loreto</option>
                            <option value="">Madre de Dios</option>
                            <option value="">Moquegua</option>
                            <option value="">Pasco</option>
                            <option value="">Piura</option>
                            <option value="">Puno</option>
                            <option value="">San Martín</option>
                            <option value="">Tacna</option>
                            <option value="">Tumbes</option>
                            <option value="">Ucayali</option>
                        </select>
                    </li>
                    <li>
                        <select name="" id="" required>
                            <option value="">Estado del Proyecto</option>
                            <option value="">En proceso</option>
                            <option value="">Culminado</option>
                        </select>
                    </li>
                    <li>
                        <button>BUSCAR</button>
                    </li>
                </ul>
            </div>
            <img src="<?= $respuesta["portada"] ?>" alt="">
        </div>
        <div class="content-services-2">
            <?php
            foreach ($respuesta1 as $item) {
                $cadena1 = $item["descripcion"];
                $stringSeparado1 = explode($separador, $cadena1);

                $cad = $stringSeparado1[0];

                $caracteres = 150;

                $cadenaAcortada = substr($cad, 0, $caracteres) . '...';

                $idServItem = $item["id_serv_item"];
                echo "
                    <div class='services'>
                        <div class='services-1'>
        
                            <div>
                                <p>" . $item["titulo"] . "</p>
                            </div>
            
                            <div>
                                <p>" . $cadenaAcortada . "</p>
                            </div>
                            <div>
                                <a href='index.php?ruta=servicios-eleccion&idItem=$idServItem' class='button2'>
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

</html>