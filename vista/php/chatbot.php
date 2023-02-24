<?php

$_SESSION["pedirNombre"] = false;
$_SESSION["saludar"] = false;
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vista/css/chatbot.css">
    <title>chatbot</title>
</head>

<body>
    <input type="checkbox" id="bossito" class="cambiarAspecto">
    <label for="bossito" class="theBoss">
        <button class="button"></button>
        <img src="vista/imagenes/chatbot/botIcono.png" alt="">
    </label>
    <div class="contenedor-chatbot" id="ventanaChat">
        <div class="content-chatbot">
            <div class="options">
                <div>
                    <img src="vista/imagenes/chatbot/botIcono.png" alt="">
                    <span id="name">TheBoss</span>
                    <label id="estado">
                        <span class="red green icon-circle"></span>
                    </label>
                </div>
                <button>
                    <i class="icon-volume-off-4" id="volumen"></i>
                </button>
                <button class="cambiarAspecto" id="bossito3">
                    <i class="icon-minus"></i>
                </button>
                <button>
                    <i class="icon-cancel" id="bossito2"></i>
                </button>
            </div>
            
            <div class="viewMessages" id="viewMessages">
                <!-- <div class="container_msg_bot">
                    <div class="container_img_bot"><img src="vista/imagenes/chatbot/botIcono.png" alt=""></div>
                    <div class="msg_bot">
                        Hola, mi nombre es TheBoss ¿en que puedo ayudarte?
                        <div class="opciones">
                            <a>Opción 1</a>
                            <a>Opción 2</a>
                            <a>Opción 3</a>
                            <a>Opción 4</a>
                        </div>
                    </div>
                </div>
                
                <div class="msg_client">
                    Hola una consulta.
                </div>
                <div class="container_msg_bot">
                    <div class="container_img_bot"><img src="vista/imagenes/chatbot/botIcono.png" alt=""></div>
                    <div class="msg_bot">
                        Buenos dias en que puedo ayudarte?
                    </div>
                </div>
                
                <div class="msg_client">
                    Hola una consulta.
                </div>
                <div class="container_msg_bot">
                    <div class="container_img_bot"><img src="vista/imagenes/chatbot/botIcono.png" alt=""></div>
                    <div class="msg_bot">
                        Buenos dias en que puedo ayudarte?
                    </div>
                </div> 
                <div class="msg_client">
                    Hola una consulta.
                </div> -->
            </div>
            <div class="interaction">
                <input type="text" placeholder="Escribe tu mensaje aquí." id="inputMsg">
                <span class="icon-direction-1" id="btnEnviar"></span>
            </div>
        </div>
    </div>
</body>
<script src="vista/js/chatbot.js"></script>

</html>