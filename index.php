<?php

require_once "controlador/plantilla.controlador.php";
require_once "controlador/servicios.controlador.php";
require_once "controlador/proyectos.controlador.php";
require_once "controlador/blogPublicaciones.controlador.php";

require_once "modelos/servicios.modelo.php";
require_once "modelos/proyectos.modelo.php";
require_once "modelos/blogPublicaciones.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
?>