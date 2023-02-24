<?php
session_start();
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
        $_SESSION["saludar"]=true;
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                    !Hola¡ Si necesita ayuda, estoy aquí para ayudarte
                        </div>
                    </div>
                </div>";
    }
//SOLICITA EL NOMBRE AL USUARIO
    public function ajaxPedirNombre()
    {   $_SESSION["saludar"]=false;
        $_SESSION["pedirNombre"]=true;
        //$_SESSION["esperarNombre"]=true;
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                    Antes de empezar, me gustaría saber tu nombre.
                        </div>
                    </div>
                </div>";
        
    }
    public function ajaxMostrarMenu0(){
        $msg = $this->msg;
        $_SESSION["pedirNombre"]=false;
        if(!isset($_SESSION["nombre"])){
            $_SESSION["nombre"] = $msg;
            $nombre = $msg;
        }else{
            $nombre = $_SESSION["nombre"];
        }
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                    Perfecto, ".$nombre.".\n
                    Te puedo ayudar con estos temas.\n
                    Seleccione una opción.
                        <div class='opciones'>
                            <a>Proyectos, servicios y contenido del blog</a>
                            <a>Información personal de la empresa</a>
                        </div>
                        </div>
                    </div>
                </div>";
    }
//MUESTRA MENU DE OPCIONES 1
    public function ajaxMostrarMenu1()
    {   
        $msg = $this->msg;
        // $_SESSION["pedirNombre"]=false;
        if(!isset($_SESSION["nombre"])){
            $_SESSION["nombre"] = $msg;
            $nombre = $msg;
        }else{
            $nombre = $_SESSION["nombre"];
        }
        
            $msg = $this->msg;
            $opciones = "";
            
        
            switch($msg){
                case "Proyectos, servicios y contenido del blog":
                    $arrayOpciones = ["Servicios", "Proyectos", "Blog"];
                    
                    foreach($arrayOpciones as $item){
                        $opciones.="<a>".$item."</a>";
                    }
                    
                    $msgBot = $nombre.", ofrecemos ".count($arrayOpciones)." opciones. ¿En cuál de ellos está interesado?";
                    $plantChat = new Chatbot();
                    echo $plantChat->getplantillaMsg($msgBot, $opciones);
                
                    break; 
                    
                case "Información personal de la empresa":
                    
                    // foreach($respuesta as $item){
                    //     $opciones.="<a>".$item["nombre"]."</a>";
                    // }
                    
                    $msgBot = $nombre.", aqui mostramos la información";
                    $plantChat = new Chatbot();
                    echo $plantChat->getplantillaMsg($msgBot, $opciones);
                    break; 
            }
            //$this->ajaxMostrarMenu1();
        }
    //MUESTRA MENU DE OPCIONES 2
    public function ajaxMostrarMenu2()
    {   
       // $_SESSION["pedirNombre"]=false;
        //$_SESSION["nombre"] = $_POST["msg"];ç
        $msg = $this->msg;
        $opciones = "";
        
    
        switch($msg){
            case "Servicios":
                $respuesta = ControladorServicios::ctrMostrarTodoServicios();
                foreach($respuesta as $serv){
                    $opciones.="<a>".$serv["nombre"]."</a>";
                }
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Proyectos":
                $respuesta = ControladorProyecto::ctrMostrarTodoProyectos();
                foreach($respuesta as $serv){
                    $opciones.="<a>".$serv["nombre"]."</a>";
                }
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de proyectos. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break;
            case "Blog":
                $item = null;
                $valor = null;
                $respuesta = ControladorBlog::ctrTraerCategoria($item, $valor);
                foreach($respuesta as $item){
                    if($item["nombre"] == "Salud"){
                        $caracter = "*";
                    }else{
                        $caracter = "";
                    }
                    $opciones.="<a>".$item["nombre"].$caracter."</a>";
                }
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." categorías del Blog. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                // $this->ajaxMostrarMenu0();
                break;    
        }
        //$this->ajaxMostrarMenu1();
    }
    public function ajaxMostrarMenu3()
    {   
        $msg = $this->msg;
        $opciones = "";
        
        switch($msg){
            case "Por Tipo":
                $item = "id_proyecto";
                $valor = 1;
                $respuesta = ControladorProyecto::ctrMostrarTipoSector($item, $valor);
                foreach($respuesta as $item){
                    if($item["nombre"] == "Pre-inversión" || $item["nombre"] == "Supervisión"){
                        $caracter = "*";
                    }else{
                        $caracter = "";
                    }
                    $opciones.="<a>".$item["nombre"].$caracter."</a>";
                }
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de proyectos. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break; 
                
            case "Por Sector":
                $item = "id_proyecto";
                $valor = 2;
                $respuesta = ControladorProyecto::ctrMostrarTipoSector($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="<a>".$item["nombre"]."</a>";
                }
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." sectores de proyectos. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantillaMsg($msgBot, $opciones);
                break; 
        }
    }
    //MUESTRA CARRUSEL DE ITEMS de SERVICIOS
    public function ajaxMostrarCarrusel()
    {   
        $msg = $this->msg;
        $opciones = "";
        
    
        switch($msg){
            case "Planificación":
                $item = "id_servicio";
                $valor = 1;
                $respuesta = ControladorServicios::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=servicios&id=$valor";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Pre-Inversión":
                $item = "id_servicio";
                $valor = 2;
                $respuesta = ControladorServicios::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=servicios&id=$valor";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Expedientes de obra":
                $item = "id_servicio";
                $valor = 3;
                $respuesta = ControladorServicios::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=servicios&id=$valor";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;  
                case "Supervisión":
                $item = "id_servicio";
                $valor = 4;
                $respuesta = ControladorServicios::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=servicios&id=$valor";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;  
        }
        $this->ajaxMostrarMenu0();

    }
    //=============CARRUSEL PARA LOS ITEM DE PROYECTOS==============
    public function ajaxMostrarCarrusel2()
    {   
       // $_SESSION["pedirNombre"]=false;
        //$_SESSION["nombre"] = $_POST["msg"];ç
        $msg = $this->msg;
        $opciones = "";
        $idPorTipo = 1;
        $idPorSector = 2;
        switch($msg){
            case "Estudio/ expediente":
                $item = "id_proy_ts";
                $valor = 1;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorTipo";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Zonificación":
                $item = "id_proy_ts";
                $valor = 2;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorTipo";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Pre-inversión*":
                $item = "id_proy_ts";
                $valor = 3;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorTipo";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;  
            case "Supervisión*":
            $item = "id_proy_ts";
            $valor = 4;
            $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
            foreach($respuesta as $item){
                $opciones.="
                <li>
                <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                <h1 class=''>".$item["titulo"]."</h1>
                </li>
            ";
            }
            $ruta = "index.php?ruta=proyectos&id=$idPorTipo";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
            $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
            $plantChat = new Chatbot();
            echo $plantChat->getplantilla2Msg($msgBot, $opciones);
            break;  
            case "Administración":
                $item = "id_proy_ts";
                $valor = 5;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Portuarios":
                $item = "id_proy_ts";
                $valor = 6;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Salud":
                $item = "id_proy_ts";
                $valor = 7;
                $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;  
            case "Viales":
            $item = "id_proy_ts";
            $valor = 8;
            $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
            foreach($respuesta as $item){
                $opciones.="
                <li>
                <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                <h1 class=''>".$item["titulo"]."</h1>
                </li>
            ";
            }
            $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
            $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
            $plantChat = new Chatbot();
            echo $plantChat->getplantilla2Msg($msgBot, $opciones);
            break; 
        case "Otras edificaciones":
            $item = "id_proy_ts";
            $valor = 9;
            $respuesta = ControladorProyecto::ctrMostrar3Item($item, $valor);
            foreach($respuesta as $item){
                $opciones.="
                <li>
                <img class='slider-single-image' src='".$item["foto"]."' alt='1' style='width:100%;' />
                <h1 class=''>".$item["titulo"]."</h1>
                </li>
            ";
            }
            $ruta = "index.php?ruta=proyectos&id=$idPorSector";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
            $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
            $plantChat = new Chatbot();
            echo $plantChat->getplantilla2Msg($msgBot, $opciones);
            break; 
        }
        $this->ajaxMostrarMenu0();

    }
    //==========CARRUSEL PARA LOS ITEMS DE BLOG====================
    public function ajaxMostrarCarrusel3()
    {   
       // $_SESSION["pedirNombre"]=false;
        //$_SESSION["nombre"] = $_POST["msg"];ç
        $msg = $this->msg;
        $opciones = "";
        
        switch($msg){
            case "Construcción":
                $item = "id_blog_cat";
                $valor = 1;
                $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);
                
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["imagen"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Economía":
                $item = "id_blog_cat";
                $valor = 2;
                $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);
                
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["imagen"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
            case "Educación":
                $item = "id_blog_cat";
                $valor = 3;
                $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);
                
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["imagen"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;  
            case "Indeconsult":
            $item = "id_blog_cat";
            $valor = 4;
            $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);
                
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["imagen"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
            break;  
            case "Salud*":
                $item = "id_blog_cat";
                $valor = 5;
                $respuesta = ControladorBlog::ctrMostrar3Publicaciones($item, $valor);
                
                foreach($respuesta as $item){
                    $opciones.="
                    <li>
                    <img class='slider-single-image' src='".$item["imagen"]."' alt='1' style='width:100%;' />
                    <h1 class=''>".$item["titulo"]."</h1>
                    </li>
                ";
                }
                $ruta = "blog";
                $opciones.="
                    <li>
                    Para más información, presionar el siguiente botón. 
                    <a href = $ruta>Clickeame</a>
                    </li>
                ";
                $msgBot = $_SESSION["nombre"].", ofrecemos ".count($respuesta)." tipos de servicios. ¿En cuál de ellos está interesado?";
                $plantChat = new Chatbot();
                echo $plantChat->getplantilla2Msg($msgBot, $opciones);
                break;
        }
        $this->ajaxMostrarMenu0();

    }
    //DA RESPUESTAS QUE NO ENTIENDE EL CHATBOT
    public function ajaxNoEncontro(){
        //PUEDE AGREGAR MÁS RESPUESTAS AL ARRAY Y SERÁN RESPONDIDAS DE MANERA ALEATORIA
        $array = ["Disculpa, no entendí", "¿Cómo?", "Vuelve a escribir, porfavor"];
        echo "<div class='container_msg_bot'>
                    <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
                    <div class='msg_bot'>
                    ".$array[rand(0,count($array)-1)]."
                        </div>
                    </div>
                </div>";
                
        $this->ajaxMostrarMenu1();
    }
    //PARA CERRAR LA SESIÓN Y EL BOT SE DESPIDE
    public function ajaxSalir(){
        
        session_destroy();
        session_start();
        $_SESSION["pedirNombre"] = false;
        $_SESSION["saludar"] = false;
        if(!isset($_POST["medio"])){
            echo "<div class='container_msg_bot'>
            <div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div>
            <div class='msg_bot'>
            Un gusto ayudarte. Adiós...
                </div>
            </div>
        </div>";
        }else{
            echo "";
        }
        
    
        
    }
}



/*=============================================

=============================================*/
//SALUDA AL USUARIO

if(isset($_POST["saludar"]) && !isset($_POST["msg"]) && !isset($_POST["nombre"])){
    echo "<script>console.log('Hola 1');</script>";
    $chatbot = new AjaxChatbot();
    $chatbot->ajaxSaludar();
    if(isset($_SESSION["nombre"])){
        $chatbot->ajaxMostrarMenu0();
    }
    //SOLICITA EL NOMBRE AL USUARIO
}else if(isset($_POST["pedirNombre"]) && !isset($_POST["msg"]) && !isset($_SESSION["nombre"])){
    echo "<script>console.log('Hola 2');</script>";
    $chatbot = new AjaxChatbot();
    $chatbot->ajaxPedirNombre();
    //MUESTRA EL MENU DE OPCIONES 1
}else if(!$_SESSION["pedirNombre"] && isset($_POST["msg"]) && $_POST["msg"] !="salir" && !isset($_SESSION["nombre"])){
    echo "<script>console.log('Hola 3');</script>";
    $chatbot = new AjaxChatbot();
    $chatbot->msg = $_POST["msg"];
    $chatbot->ajaxSaludar();
    $chatbot->ajaxPedirNombre();

//MUESTRA MENU DE OPCIONES 0
}else if(isset($_POST["msg"]) && !$_SESSION["pedirNombre"]){
    if($_POST["msg"] == "Proyectos, servicios y contenido del blog" || $_POST["msg"] == "Información personal de la empresa"){
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxMostrarMenu1();
    }else if($_POST["msg"] == "Servicios" || $_POST["msg"] == "Proyectos" || $_POST["msg"] == "Blog"){
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        if(!isset($_SESSION["nombre"])){
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        }else{
        $chatbot->ajaxMostrarMenu2();
        }
        //MUESTRA EL CARRUSEL DE ITEMS
    }else if($_POST["msg"] == "Planificación" || $_POST["msg"] == "Pre-Inversión" || $_POST["msg"] == "Expedientes de obra" || $_POST["msg"] == "Supervisión"){
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxMostrarCarrusel();
    }else if($_POST["msg"] == "Por Tipo" || $_POST["msg"] == "Por Sector"){
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        
        if(!isset($_SESSION["nombre"])){
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        }else{
            $chatbot->ajaxMostrarMenu3();
        } 
    }else if($_POST["msg"] == "Estudio/ expediente" || $_POST["msg"] == "Zonificación" || $_POST["msg"] == "Pre-inversión*" || $_POST["msg"] == "Supervisión*" || $_POST["msg"] == "Administración" || $_POST["msg"] == "Portuarios" || $_POST["msg"] == "Salud" || $_POST["msg"] == "Viales" || $_POST["msg"] == "Otras edificaciones"){
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        
        if(!isset($_SESSION["nombre"])){
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        }else{
            $chatbot->ajaxMostrarCarrusel2();
        } 
    }else if($_POST["msg"] == "Construcción" || $_POST["msg"] == "Economía" || $_POST["msg"] == "Educación" || $_POST["msg"] == "Indeconsult" || $_POST["msg"] == "Salud*"){
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        
        if(!isset($_SESSION["nombre"])){
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        }else{
            $chatbot->ajaxMostrarCarrusel3();
        } 
    }else if($_POST["msg"] == "menu" || $_POST["msg"] == "Menu"){
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        
        if(!isset($_SESSION["nombre"])){
            $chatbot->ajaxSaludar();
            $chatbot->ajaxPedirNombre();
        }else{
            $chatbot->ajaxMostrarMenu0();
        }
    }else if($_POST["msg"] == "salir" || $_POST["msg"] == "Salir"){
        $chatbot = new AjaxChatbot();
        $chatbot->msg = $_POST["msg"];
        $chatbot->ajaxSalir();
        
    }else{
        //MUESTRA PALABRAS QUE NO ENTIENDE EL CHATBOT
        echo "<script>console.log('Hola 5');</script>";
    $chatbot = new AjaxChatbot();
    $chatbot->ajaxNoEncontro();
}

}else if(isset($_POST["msg"]) && $_SESSION["pedirNombre"] && $_POST["msg"] !="salir"){
    echo "<script>console.log('Hola pedir nombre');</script>";
    $_SESSION["nombre"] = $_POST["msg"];
    $chatbot = new AjaxChatbot();
    $chatbot->msg = $_POST["msg"];
    $chatbot->ajaxMostrarMenu0();
    $_SESSION["pedirNombre"] =  false;

}
// if (isset($_POST["idCategoria"]) && isset($_POST["valorAnio"]) && isset($_POST["pagina"])) {
    
// }
