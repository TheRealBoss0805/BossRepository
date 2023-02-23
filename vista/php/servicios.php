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
                        <select id="ubicacionServicio" required>
                            <?php
                      
                            echo   "<option value='Ubicación'>Ubicación</option>";
                            foreach ($respuesta1 as $item2) {
                                echo "<option value='".$item2["lugar"]."'>".$item2["lugar"]."</option>";
                            }
                            ?>
                            <!--<option value="Ubicación">Ubicación</option>
                            <option value="Amazonas">Amazonas</option>
                            <option value="Áncash">Áncash</option>
                            <option value="Apurímac">Apurímac</option>
                            <option value="Arequipa">Arequipa</option>
                            <option value="Ayacucho">Ayacucho</option>
                            <option value="Cajamarca">Cajamarca</option>
                            <option value="Callao">Callao</option>
                            <option value="Cusco">Cusco</option>
                            <option value="Huancavelica">Huancavelica</option>
                            <option value="Huánuco">Huánuco</option>
                            <option value="Ica">Ica</option>
                            <option value="Junín">Junín</option>
                            <option value="La Libertad">La Libertad</option>
                            <option value="Lambayeque">Lambayeque</option>
                            <option value="Lima">Lima</option>
                            <option value="Loreto">Loreto</option>
                            <option value="Madre de Dios">Madre de Dios</option>
                            <option value="Moquegua">Moquegua</option>
                            <option value="Pasco">Pasco</option>
                            <option value="Piura">Piura</option>
                            <option value="Puno">Puno</option>
                            <option value="San Martín">San Martín</option>
                            <option value="Tacna">Tacna</option>
                            <option value="Tumbes">Tumbes</option>
                            <option value="Ucayali">Ucayali</option>-->
                        </select>
                    </li>
                    <li>
                        <select id="estadoServicio" required>
                            <option value="Estado">Estado</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Culminado">Culminado</option>
                        </select>
                    </li>
                    <li>
                        <button type="button" id="botonServicio">BUSCAR</button>
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
                    <input type='hidden' class='item' valor='" . $item["lugar"] . "'>
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