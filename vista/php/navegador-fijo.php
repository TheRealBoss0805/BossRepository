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
                <a href="#"><img src="vista/imagenes/extras/idcLogo2.png"></a>
            </div>
        </div>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="label-check">
                <i class="icon-menu"></i>
            </label>
            <ul class="ul-responsive">
                <li class="nav-li" id="inicio"><a href="inicio">Inicio</a></li>
                <li class="nav-li" id="nosotros">
                    <a href="">Nosotros</a><span class="icon-plus no-responsive"></span>
                    <input type="checkbox" id="check2">
                    <label for="check2" class="label-check la">
                        <i class="icon-plus responsive"></i>
                    </label>
                    <ul>
                        <li><a href="nosotros">Quiénes Somos</a></li>
                        <li><a href="nosotros" style="border-bottom: none;">Políticas de Gestión</a></li>
                    </ul>
                </li>
                <li class="nav-li" id="servicios">
                    <a href="">Servicios</a><span class="icon-plus no-responsive"></span>
                    <input type="checkbox" id="check3">
                    <label for="check3" class="label-check la">
                        <i class="icon-plus responsive"></i>
                    </label>
                    <ul>
                        <li><a href="servicios">Planificación</a></li>
                        <li><a href="servicios">Pre - Inversión</a></li>
                        <li><a href="servicios">Expedientes de Obra</a></li>
                        <li><a href="servicios" style="border-bottom: none;">Supervisión</a></li>
                    </ul>
                </li>
                <li class="nav-li" id="proyectos">
                    <a href="">Proyectos</a><span class="icon-plus no-responsive"></span>
                    <input type="checkbox" id="check4">
                    <label for="check4" class="label-check la">
                        <i class="icon-plus responsive"></i>
                    </label>
                    <ul>
                        <li><a href="proyecto-tipo">Por Tipo</a></li>
                        <li><a href="proyecto-sector" style="border-bottom: none;">Por Sector</a></li>
                    </ul>
                </li>
                <li class="nav-li"><a href="blog">Blog</a></li>
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