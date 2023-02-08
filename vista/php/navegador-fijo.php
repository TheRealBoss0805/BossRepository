<?php
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vista/css/navegador-fijo.css">
    <title>Navegador fijo</title>
</head>

<body>
    <div class="info-fijo">
        <div>
            <p>" Planificando, Desarrollando y Construyendo "</p>
        </div>
        <div>
            <span class="icon-location" style="font-size: 35px; color: rgb(104, 102, 102);"></span>
            <div>
                <p>Dirección</p>
                <p>Jr. Monterosa 233 Of. 507, Santiago de Surco, Lima.</p>
            </div>
        </div>
        <div>
            <span class="icon-clock" style="font-size: 35px; color: rgb(104, 102, 102);"></span>
            <div>
                <p>Horario</p>
                <p>L-S de 08:00 a 20:00 Horas</p>
            </div>
        </div>
    </div>

    <!--NAVEGADOR-->

    <header>
        <div class="contenedor-logo">
            <div class="svg-img">
                <a href="inicio"><img src="vista/imagenes/extras/idcLogo2.png"></a>
            </div>
        </div>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="label-check">
                <i class="icon-menu"></i>
            </label>
            <ul class="ul-responsive">
                <!--1-->
                <li class="nav-li" id="inicio">
                    <a href="inicio">Inicio</a>
                </li>
                <!--2-->
                <li class="nav-li" id="nosotros">
                    <a>Nosotros</a>
                    <span class="icon-plus no-responsive"></span>
                    <input type="checkbox" id="check2">
                    <label for="check2" class="label-check la">
                        <i class="icon-plus responsive" id="forma"></i>
                    </label>
                    <ul>
                        <li><a href="nosotros">Quiénes Somos</a></li>
                        <li><a href="nosotros" style="border-bottom: none;">Políticas de Gestión</a></li>
                    </ul>
                </li>
                <!--3-->
                <li class="nav-li" id="servicios">
                    <a>Servicios</a><span class="icon-plus no-responsive"></span>
                    <input type="checkbox" id="check3">
                    <label for="check3" class="label-check la">
                        <i class="icon-plus responsive" id="forma1"></i>
                    </label>
                    <ul>
                        <li><a href="index.php?ruta=servicios&id=1">Planificación</a></li>
                        <li><a href="index.php?ruta=servicios&id=2">Pre - Inversión</a></li>
                        <li><a href="index.php?ruta=servicios&id=3">Expedientes de Obra</a></li>
                        <li><a href="index.php?ruta=servicios&id=4" style="border-bottom: none;">Supervisión</a></li>
                    </ul>
                </li>
                <!--4-->
                <li class="nav-li" id="proyectos">
                    <a>Proyectos</a><span class="icon-plus no-responsive"></span>
                    <input type="checkbox" id="check4">
                    <label for="check4" class="label-check la">
                        <i class="icon-plus responsive" id="forma2"></i>
                    </label>
                    <ul>
                        <li><a href="index.php?ruta=proyectos&id=1">Por Tipo</a></li>
                        <li><a href="index.php?ruta=proyectos&id=2" style="border-bottom: none;">Por Sector</a></li>
                    </ul>
                </li>
                <!--5-->
                <li class="nav-li" id="blog">
                    <a href="blog">Blog</a></li>
                <li>
                    <a href="contactanos" class="contactanos">
                        <span class="label">Contáctenos</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

</body>
<script src="vista/js/navegador-fijo.js"></script>

</html>