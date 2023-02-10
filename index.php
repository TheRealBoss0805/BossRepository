<?php

require_once "controlador/plantilla.controlador.php";
require_once "controlador/servicios.controlador.php";
require_once "controlador/proyectos.controlador.php";
require_once "controlador/blogPublicaciones.controlador.php";

require_once "modelos/servicios.modelo.php";
require_once "modelos/proyectos.modelo.php";
require_once "modelos/blogPublicaciones.modelo.php";
/*require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/salidas.controlador.php";
require_once "controladores/entradas.controlador.php";
require_once "controladores/areas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/salidas.modelo.php";
require_once "modelos/entradas.modelo.php";
require_once "modelos/areas.modelo.php";
require_once "extensiones/vendor/autoload.php";*/

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
?>