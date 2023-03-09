<?php
session_start();
$timezone = 'America/Lima';
date_default_timezone_set($timezone);
require_once "../controlador/servicios.controlador.php";
require_once "../modelos/servicios.modelo.php";
require_once "../controlador/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";
require_once "../controlador/blogPublicaciones.controlador.php";
require_once "../modelos/blogPublicaciones.modelo.php";
require_once "../modelos/Chatbot.php";

class AjaxChatbot
{

    /*=============================================
	TRAE LOS ITEMS DE ACUERDO A LOS FILTROS QUE SE APLIQUEN, YA SEA POR SECTOR O TIPO
	=============================================*/

    public $idCategoria;
    public $valorAnio;
    public $valorPagina;
    public $msg;

    //SALUDA AL ENTRAR A LA CHATBOT

    public function ajaxSaludar()
    {
        $_SESSION["saludar"] = true;
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                        <p>!Hola¡ <span>&#128075;</span><span>&#128075;</span> Si necesita ayuda, estoy aquí para ayudarte <span>&#128578;</span><span>&#128578;</span></p>
                        <div class='print_hour'>" . date('h:i:s a', time()) . "</div>
                        </div>
                    </div>
                </div>";
    }

    //SOLICITA EL NOMBRE AL USUARIO

    public function ajaxPedirNombre()
    {
        $_SESSION["saludar"] = false;
        $_SESSION["pedirNombre"] = true;
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                        <p>Antes de empezar, me gustaría conocer tu nombre <span>&#128221;</span>&#128221;<span></span></p>
                        <div class='print_hour'>" . date('h:i:s a', time()) . "</div> 
                    </div>
                    </div>
                </div>";
    }
    public function ajaxMostrarMenu0()
    {
        $msg = $this->msg;
        $_SESSION["pedirNombre"] = false;
        if (!isset($_SESSION["nombre"])) {
            $_SESSION["nombre"] = $msg;
            $nombre = $msg;
        } else {
            $nombre = $_SESSION["nombre"];
        }
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                    <p>Hola, <span class='nameRpta'>" . $nombre . ".</span> <span>&#129309;</span><span>&#129309;</span>\n
                    Te puedo ayudar con estos temas.\n
                    Seleccione una opción.</p>
                        <div class='opciones'>
                            <a>Proyectos, servicios y blog</a>
                            <a>Información de la empresa</a>
                        </div>
                        <div class='print_hour'>" . date('h:i:s a', time()) . "</div> 
                        </div>
                    </div>
                </div>";
    }

    public function ajaxMostrarMenuEleccion()
    {
        $msg = $this->msg;
        $_SESSION["pedirNombre"] = false;
        if (!isset($_SESSION["nombre"])) {
            $_SESSION["nombre"] = $msg;
            $nombre = $msg;
        } else {
            $nombre = $_SESSION["nombre"];
        }
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                    <p><span class='nameRpta'>" . $nombre . ".</span><span>&#128522;</span>\n
                    te encuentras en el apartado de Servicios ¿que acción deseas realizar?\n
                    Selecciona una opción.</p>
                        <div class='opciones'>
                            <a>Continuar en Servicios</a>
                            <a>Volver al Menú Principal</a>
                        </div>
                        <div class='print_hour'>" . date('h:i:s a', time()) . "</div> 
                        </div>
                    </div>
                </div>";
    }
    public function ajaxMostrarMenuEleccion2()
    {
        $msg = $this->msg;
        $_SESSION["pedirNombre"] = false;
        if (!isset($_SESSION["nombre"])) {
            $_SESSION["nombre"] = $msg;
            $nombre = $msg;
        } else {
            $nombre = $_SESSION["nombre"];
        }
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                    <p><span class='nameRpta'>" . $nombre . ".</span><span>&#128522;</span>\n
                    te encuentras en el apartado de Proyectos ¿que acción deseas realizar?\n
                    Selecciona una opción.</p>
                        <div class='opciones'>
                            <a>Continuar en Proyectos</a>
                            <a>Volver al Menú Principal</a>
                        </div>
                        <div class='print_hour'>" . date('h:i:s a', time()) . "</div> 
                        </div>
                    </div>
                </div>";
    }
    public function ajaxMostrarMenuEleccion3()
    {
        $msg = $this->msg;
        $_SESSION["pedirNombre"] = false;
        if (!isset($_SESSION["nombre"])) {
            $_SESSION["nombre"] = $msg;
            $nombre = $msg;
        } else {
            $nombre = $_SESSION["nombre"];
        }
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                    <p><span class='nameRpta'>" . $nombre . ".</span><span>&#128522;</span>\n
                    te encuentras en la sección, Blog ¿que acción deseas realizar?\n
                    Selecciona una opción.</p>
                        <div class='opciones'>
                            <a>Continuar en Blog</a>
                            <a>Volver al Menú Principal</a>
                        </div>
                        <div class='print_hour'>" . date('h:i:s a', time()) . "</div> 
                        </div>
                    </div>
                </div>";
    }

    //MUESTRA MENU DE OPCIONES 1

    public function ajaxMostrarMenu1()
    {
        $msg = $this->msg;

        if (!isset($_SESSION["nombre"])) {
            $_SESSION["nombre"] = $msg;
            $nombre = $msg;
        } else {
            $nombre = $_SESSION["nombre"];
        }

        $msg = $this->msg;
        $opciones = "";


        switch ($msg) {
            case "Proyectos, servicios y blog":

                $arrayOpciones = ["Servicios", "Proyectos", "Blog"];

                foreach ($arrayOpciones as $item) {
                    $opciones .= "<a>" . $item . "</a>";
                }

                $msgBot = "<p><span class='nameRpta'>" . $nombre . "</span> <span>&#128522;</span>, ofrecemos " . count($arrayOpciones) . " opciones. ¿En cuál de ellos está interesado?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);

                break;

            case "Información de la empresa":

                $arrayOpciones = ["Ubicación Legal", "Teléfonos", "Correos", "Redes Sociales"];
                foreach ($arrayOpciones as $item) {
                    $opciones .= "<a>" . $item . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $nombre . "</span> <span>&#128522;</span>, aqui mostramos la información que solicitaste. Contamos con " . count($arrayOpciones) . " opciones. ¿Cuál te interesa más?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
        }
    }

    //MUESTRA MENU DE OPCIONES 2

    public function ajaxMostrarMenu2()
    {
        $msg = $this->msg;
        $opciones = "";


        switch ($msg) {
            case "Servicios":
                $respuesta = ControladorServicios::ctrMostrarTodoServicios();
                foreach ($respuesta as $serv) {
                    $opciones .= "<a>" . $serv["nombre"] . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, ofrecemos <span class='rpta'>" . count($respuesta) . " tipos de servicios.</span> ¿En cuál de ellos está interesado?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Proyectos":
                $respuesta = ControladorProyecto::ctrMostrarTodoProyectos();
                foreach ($respuesta as $serv) {
                    $opciones .= "<a>" . $serv["nombre"] . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, ofrecemos <span class='rpta'>" . count($respuesta) . " tipos de proyectos.</span> ¿En cuál de ellos está interesado?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Blog":
                $item = null;
                $valor = null;
                $respuesta = ControladorBlog::ctrTraerCategoria($item, $valor);
                foreach ($respuesta as $item) {
                    if ($item["nombre"] == "Salud") {
                        $caracter = "*";
                    } else {
                        $caracter = "";
                    }
                    $opciones .= "<a>" . $item["nombre"] . $caracter . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, ofrecemos <span class='rpta'>" . count($respuesta) . " categorías del Blog.</span> ¿En cuál de ellos está interesado?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;

            case "Ubicación Legal":
                $respuesta = ["Continuar en Info de IDC", "Volver al Menú Principal"];
                foreach ($respuesta as $ubicacion) {
                    $opciones .= "<a>" . $ubicacion . "</a>";
                }
                $msgBot = "<p> <span class='nameRpta'>" . $_SESSION['nombre'] . "</span> <span>&#128522;</span>, nuestra Ubicación específica es: <span class='rpta'>JR. Monterosa Nro. 233 Int. 507 Urb. Chacarrilla Del Estanque 
                (Altura cuadra 03 de Av. Primavera)</span></p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Teléfonos":
                $respuesta = ["Continuar en Info de IDC", "Volver al Menú Principal"];
                foreach ($respuesta as $ubicacion) {
                    $opciones .= "<a>" . $ubicacion . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, actualmente poseemos 2 números telefónicos:<br><span class='rpta'>(51) (1) 2439211<br>(51) (1) 2439212</span></p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Correos":
                $respuesta = ["Continuar en Info de IDC", "Volver al Menú Principal"];
                foreach ($respuesta as $ubicacion) {
                    $opciones .= "<a>" . $ubicacion . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, contamos con diversos correos para fines específicos, estos son los
                siguientes:<br><span class='rpta'>Información:<br>secretaria@indeconsult.pe<br>Licitaciones:<br>comercial@indeconsult.pe<br>Ingeniería:<br>ingenieria@indeconsult.pe<br>Proyectos:<br>proyectos@indeconsult.pe<br>Administración:<br>administración@indeconsult.pe</span></p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Redes Sociales":
                $respuesta = ["Continuar en Info de IDC", "Volver al Menú Principal"];
                foreach ($respuesta as $ubicacion) {
                    $opciones .= "<a>" . $ubicacion . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, Actualmente contamos con una Red Social activa por parte de la Empresa, visítanos en
                nuestro Facebook Oficial: <a href='https://www.facebook.com/institutodeconsultoriasa' target='_black'class='linkFaceBot'>Instituto de Consultoría S.A</a></p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
        }
    }
    public function ajaxMostrarMenu3()
    {
        $msg = $this->msg;
        $opciones = "";

        switch ($msg) {
            case "Por Tipo":
                $item = "id_proyecto";
                $valor = 1;
                $respuesta = ControladorProyecto::ctrMostrarTipoSector($item, $valor);
                foreach ($respuesta as $item) {
                    if ($item["nombre"] == "Pre-inversión" || $item["nombre"] == "Supervisión") {
                        $caracter = "*";
                    } else {
                        $caracter = "";
                    }
                    $opciones .= "<a>" . $item["nombre"] . $caracter . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, ofrecemos <span class='rpta'>" . count($respuesta) . " categorías respecto a Proyectos por Tipo.</span> ¿En cuál de ellos está interesado?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;

            case "Por Sector":
                $item = "id_proyecto";
                $valor = 2;
                $respuesta = ControladorProyecto::ctrMostrarTipoSector($item, $valor);
                foreach ($respuesta as $item) {
                    $opciones .= "<a>" . $item["nombre"] . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, ofrecemos <span class='rpta'>" . count($respuesta) . " categorías respecto a Proyectos por Sector.</span> ¿En cuál de ellos está interesado?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
        }
    }

    //RESPECTO A LA INFORMACIÓN DE LA EMPRESA

    public function ajaxMostrarOpcionesInfo()
    {
        $msg = $this->msg;
        $msgBot = "";
        $opciones = "";
        switch ($msg) {
            case "Continuar en Info de IDC":
                $arrayOpciones = ["Ubicación Legal", "Teléfonos", "Correos", "Redes Sociales"];
                foreach ($arrayOpciones as $item) {
                    $opciones .= "<a>" . $item . "</a>";
                }
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Volver al Menú Principal":
                $this->ajaxMostrarMenu0();
                break;
        }
    }

    //MUESTRA CARRUSEL DE ITEMS de SERVICIOS

    public function ajaxMostrarCarrusel()
    {
        $msg = $this->msg;
        $opciones = "";

        switch ($msg) {
            case "Planificación":
                $item = "id_servicio";
                $valor = 1;
                $respuesta = ControladorServicios::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idServItem = $item["id_serv_item"];
                    $opciones .= "
                    <li>
                        <a class='urlImagenSlider' href='index.php?ruta=servicios-eleccion&idItem=$idServItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                        <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=servicios&id=$valor";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";

                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Pre-Inversión":
                $item = "id_servicio";
                $valor = 2;
                $respuesta = ControladorServicios::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idServItem = $item["id_serv_item"];
                    $opciones .= "
                    <li>
                        <a class='urlImagenSlider' href='index.php?ruta=servicios-eleccion&idItem=$idServItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                        <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=servicios&id=$valor";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Expedientes de obra":
                $item = "id_servicio";
                $valor = 3;
                $respuesta = ControladorServicios::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idServItem = $item["id_serv_item"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=servicios-eleccion&idItem=$idServItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=servicios&id=$valor";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Supervisión":
                $item = "id_servicio";
                $valor = 4;
                $respuesta = ControladorServicios::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idServItem = $item["id_serv_item"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=servicios-eleccion&idItem=$idServItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=servicios&id=$valor";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
        }
        $this->ajaxMostrarMenuEleccion();
    }

    public function ajaxMostrarOpcionesItem1()
    {
        $msg = $this->msg;
        $msgBot = "";
        $opciones = "";
        switch ($msg) {
            case "Continuar en Servicios":
                $respuesta = ControladorServicios::ctrMostrarTodoServicios();
                foreach ($respuesta as $serv) {
                    $opciones .= "<a>" . $serv["nombre"] . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, ofrecemos <span class='rpta'>" . count($respuesta) . " tipos de servicios.</span> ¿En cuál de ellos está interesado?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Volver al Menú Principal":
                $this->ajaxMostrarMenu0();
                break;
        }
    }

    //=============CARRUSEL PARA LOS ITEM DE PROYECTOS==============

    public function ajaxMostrarCarrusel2()
    {

        $msg = $this->msg;
        $opciones = "";
        $idPorTipo = 1;
        $idPorSector = 2;
        switch ($msg) {
            case "Estudio/ expediente":
                $item = "id_proy_ts";
                $valor = 1;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idProyItem = $item["id_proyec_item"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=proyecto-eleccion&id=$idProyItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorTipo";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Zonificación":
                $item = "id_proy_ts";
                $valor = 2;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idProyItem = $item["id_proyec_item"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=proyecto-eleccion&id=$idProyItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorTipo";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Pre-inversión*":
                $item = "id_proy_ts";
                $valor = 3;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idProyItem = $item["id_proyec_item"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=proyecto-eleccion&id=$idProyItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorTipo";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Supervisión*":
                $item = "id_proy_ts";
                $valor = 4;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idProyItem = $item["id_proyec_item"];
                    $opciones .= "
                <li>
                <a class='urlImagenSlider' href='index.php?ruta=proyecto-eleccion&id=$idProyItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                </li>
            ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorTipo";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Administración":
                $item = "id_proy_ts";
                $valor = 5;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idProyItem = $item["id_proyec_item"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=proyecto-eleccion&id=$idProyItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Portuarios":
                $item = "id_proy_ts";
                $valor = 6;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idProyItem = $item["id_proyec_item"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=proyecto-eleccion&id=$idProyItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Salud":
                $item = "id_proy_ts";
                $valor = 7;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idProyItem = $item["id_proyec_item"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=proyecto-eleccion&id=$idProyItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Viales":
                $item = "id_proy_ts";
                $valor = 8;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idProyItem = $item["id_proyec_item"];
                    $opciones .= "
                <li>
                <a class='urlImagenSlider' href='index.php?ruta=proyecto-eleccion&id=$idProyItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                </li>
            ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Otras edificaciones":
                $item = "id_proy_ts";
                $valor = 9;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach ($respuesta as $item) {
                    $idProyItem = $item["id_proyec_item"];
                    $opciones .= "
                <li>
                <a class='urlImagenSlider' href='index.php?ruta=proyecto-eleccion&id=$idProyItem'><img class='slider-single-image' src='" . $item["foto"] . "' alt='1' style='width:100%;' /></a>
                <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                </li>
            ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
        }
        $this->ajaxMostrarMenuEleccion2();
    }

    public function ajaxMostrarOpcionesItem2()
    {
        $msg = $this->msg;
        $msgBot = "";
        $opciones = "";
        switch ($msg) {
            case "Continuar en Proyectos":
                $respuesta = ControladorProyecto::ctrMostrarTodoProyectos();
                foreach ($respuesta as $serv) {
                    $opciones .= "<a>" . $serv["nombre"] . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, ofrecemos <span class='rpta'>" . count($respuesta) . " tipos de proyectos.</span> ¿En cuál de ellos está interesado?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Volver al Menú Principal":
                $this->ajaxMostrarMenu0();
                break;
        }
    }

    //==========CARRUSEL PARA LOS ITEMS DE BLOG====================

    public function ajaxMostrarCarrusel3()
    {
        $msg = $this->msg;
        $opciones = "";

        switch ($msg) {
            case "Construcción":
                $item = "id_blog_cat";
                $valor = 1;
                $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);

                foreach ($respuesta as $item) {
                    $idBlogItem = $item["id_blog_pub"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=blog-seleccion&id=$idBlogItem'><img class='slider-single-image' src='" . $item["imagen"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Economía":
                $item = "id_blog_cat";
                $valor = 2;
                $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);

                foreach ($respuesta as $item) {
                    $idBlogItem = $item["id_blog_pub"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=blog-seleccion&id=$idBlogItem'><img class='slider-single-image' src='" . $item["imagen"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Educación":
                $item = "id_blog_cat";
                $valor = 3;
                $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);

                foreach ($respuesta as $item) {
                    $idBlogItem = $item["id_blog_pub"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=blog-seleccion&id=$idBlogItem'><img class='slider-single-image' src='" . $item["imagen"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Indeconsult":
                $item = "id_blog_cat";
                $valor = 4;
                $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);

                foreach ($respuesta as $item) {
                    $idBlogItem = $item["id_blog_pub"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=blog-seleccion&id=$idBlogItem'><img class='slider-single-image' src='" . $item["imagen"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Salud*":
                $item = "id_blog_cat";
                $valor = 5;
                $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);

                foreach ($respuesta as $item) {
                    $idBlogItem = $item["id_blog_pub"];
                    $opciones .= "
                    <li>
                    <a class='urlImagenSlider' href='index.php?ruta=blog-seleccion&id=$idBlogItem'><img class='slider-single-image' src='" . $item["imagen"] . "' alt='1' style='width:100%;' /></a>
                    <h1 class='h1-image'>" . $item["titulo"] . "</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones .= "
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"] . ", ofrecemos " . count($respuesta) . " tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
        }
        $this->ajaxMostrarMenuEleccion3();
    }

    public function ajaxMostrarOpcionesItem3()
    {
        $msg = $this->msg;
        $msgBot = "";
        $opciones = "";
        switch ($msg) {
            case "Continuar en Blog":
                $item = null;
                $valor = null;
                $respuesta = ControladorBlog::ctrTraerCategoria($item, $valor);
                foreach ($respuesta as $item) {
                    if ($item["nombre"] == "Salud") {
                        $caracter = "*";
                    } else {
                        $caracter = "";
                    }
                    $opciones .= "<a>" . $item["nombre"] . $caracter . "</a>";
                }
                $msgBot = "<p><span class='nameRpta'>" . $_SESSION["nombre"] . "</span> <span>&#128522;</span>, ofrecemos <span class='rpta'>" . count($respuesta) . " categorías del Blog.</span> ¿En cuál de ellos está interesado?</p>";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Volver al Menú Principal":
                $this->ajaxMostrarMenu0();
                break;
        }
    }

    //DA RESPUESTAS QUE NO ENTIENDE EL CHATBOT

    public function ajaxNoEncontro()
    {
        //PUEDE AGREGAR MÁS RESPUESTAS AL ARRAY Y SERÁN RESPONDIDAS DE MANERA ALEATORIA

        $array = ["Disculpa, no entendí", "¿Cómo?", "Vuelve a escribir, porfavor"];
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                    " . $array[rand(0, count($array) - 1)] . "
                    <div class='print_hour'>" . date('h:i:s a', time()) . "</div>
                        </div>
                    </div>
                </div>";

        $this->ajaxMostrarMenu1();
    }

    //PARA CERRAR LA SESIÓN Y EL BOT SE DESPIDE

    public function ajaxSalir()
    {

        session_destroy();
        session_start();
        $_SESSION["pedirNombre"] = false;
        $_SESSION["saludar"] = false;
        if (!isset($_POST["medio"])) {
            echo "<div class='container_msg_bot'>
            <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
            <div class='msg_bot'>
            <p>Espero haberte ayudado, Hasta luego <span>&#128077;</span></p>
            <div class='print_hour'>" . date('h:i:s a', time()) . "</div>
                </div>
            </div>
        </div>";
        } else {
            echo "";
        }
    }
}

//SALUDA AL USUARIO

if (isset($_POST["saludar"]) && !isset($_POST["msg"]) && !isset($_POST["nombre"])) {
    echo "<script>console.log('Hola 1');</script>";
    $chatbot = new AjaxChatbot();
    $chatbot->ajaxSaludar();
    if (isset($_SESSION["nombre"])) {
        $chatbot->ajaxMostrarMenu0();
    }

    //SOLICITA EL NOMBRE AL USUARIO

} else if (isset($_POST["pedirNombre"]) && !isset($_POST["msg"]) && !isset($_SESSION["nombre"])) {
    echo "<script>console.log('Hola 2');</script>";
    $chatbot = new AjaxChatbot();
    $chatbot->ajaxPedirNombre();

    //MUESTRA EL MENU DE OPCIONES 1

} else if (!$_SESSION["pedirNombre"] && isset($_POST["msg"]) && $_POST["msg"] != "salir" && !isset($_SESSION["nombre"])) {
    echo "<script>console.log('Hola 3');</script>";
    $chatbot = new AjaxChatbot();
    $chatbot->msg = $_POST["msg"];
    $chatbot->ajaxSaludar();
    $chatbot->ajaxPedirNombre();

    //MUESTRA MENU DE OPCIONES 0

} else if (isset($_POST["msg"]) && !$_SESSION["pedirNombre"]) {
    if ($_POST["msg"] == "Proyectos, servicios y blog" || $_POST["msg"] == "Información de la empresa") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxMostrarMenu1();
    } else if ($_POST["msg"] == "Servicios" || $_POST["msg"] == "Proyectos" || $_POST["msg"] == "Blog") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        if (!isset($_SESSION["nombre"])) {
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        } else {
            $chatbot->ajaxMostrarMenu2();
        }
    } else if ($_POST["msg"] == "Ubicación Legal" || $_POST["msg"] == "Teléfonos" || $_POST["msg"] == "Correos" || $_POST["msg"] == "Redes Sociales") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        if (!isset($_SESSION["nombre"])) {
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        } else {
            $chatbot->ajaxMostrarMenu2();
        }

        //DATOS DE LA EMPRESA

    } else if ($_POST["msg"] == "Continuar en Info de IDC" || $_POST["msg"] == "Volver al Menú Principal") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxMostrarOpcionesInfo();

        //DATOS DE LOS ITEMS

    } else if ($_POST["msg"] == "Continuar en Servicios" || $_POST["msg"] == "Volver al Menú Principal") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxMostrarOpcionesItem1();

    } else if ($_POST["msg"] == "Continuar en Proyectos" || $_POST["msg"] == "Volver al Menú Principal") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxMostrarOpcionesItem2();
    
    } else if ($_POST["msg"] == "Continuar en Blog" || $_POST["msg"] == "Volver al Menú Principal"){
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxMostrarOpcionesItem3();

        //MUESTRA EL CARRUSEL DE ITEMS

    } else if ($_POST["msg"] == "Planificación" || $_POST["msg"] == "Pre-Inversión" || $_POST["msg"] == "Expedientes de obra" || $_POST["msg"] == "Supervisión") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxMostrarCarrusel();
    } else if ($_POST["msg"] == "Por Tipo" || $_POST["msg"] == "Por Sector") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];

        if (!isset($_SESSION["nombre"])) {
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        } else {
            $chatbot->ajaxMostrarMenu3();
        }
    } else if ($_POST["msg"] == "Estudio/ expediente" || $_POST["msg"] == "Zonificación" || $_POST["msg"] == "Pre-inversión*" || $_POST["msg"] == "Supervisión*" || $_POST["msg"] == "Administración" || $_POST["msg"] == "Portuarios" || $_POST["msg"] == "Salud" || $_POST["msg"] == "Viales" || $_POST["msg"] == "Otras edificaciones") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];

        if (!isset($_SESSION["nombre"])) {
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        } else {
            $chatbot->ajaxMostrarCarrusel2();
        }
    } else if ($_POST["msg"] == "Construcción" || $_POST["msg"] == "Economía" || $_POST["msg"] == "Educación" || $_POST["msg"] == "Indeconsult" || $_POST["msg"] == "Salud*") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];

        if (!isset($_SESSION["nombre"])) {
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        } else {
            $chatbot->ajaxMostrarCarrusel3();
        }
    } else if ($_POST["msg"] == "menu" || $_POST["msg"] == "Menu") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];

        if (!isset($_SESSION["nombre"])) {
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        } else {
            $chatbot->ajaxMostrarMenu0();
        }
    } else if ($_POST["msg"] == "salir" || $_POST["msg"] == "Salir") {
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxSalir();
    } else {

        //MUESTRA PALABRAS QUE NO ENTIENDE EL CHATBOT

        echo "<script>console.log('Hola 5');</script>";
        $chatbot = new AjaxChatbot();
        $chatbot->ajaxNoEncontro();
    }
} else if (isset($_POST["msg"]) && $_SESSION["pedirNombre"] && $_POST["msg"] != "salir") {
    echo "<script>console.log('Hola pedir nombre');</script>";
    $_SESSION["nombre"] = $_POST["msg"];
    $chatbot = new AjaxChatbot();
    $chatbot->msg = $_POST["msg"];
    $chatbot->ajaxMostrarMenu0();
    $_SESSION["pedirNombre"] =  false;
}
