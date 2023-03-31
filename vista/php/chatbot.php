<?php

$_SESSION["pedirNombre"] = false;
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vista/css/chatbot.css">
    <title>chatbot</title>
</head>

<body>
    <button type="button" class="btn messageInception">
        <p>¡Hola! ¿Puedo ayudarte?</p>
        <div id="container-stars">
            <div id="stars"></div>
        </div>
        <div id="glow">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
    </button>
    <input type="checkbox" id="bossito" class="cambiarAspecto">
    <label for="bossito" class="theBoss">
        <!-- <img src="vista/imagenes/chatbot/botIcono.png" alt=""> -->
        <img src="vista/imagenes/chatbot/chatbot-burbuja.png" alt="">
        <!-- <i class="fi fi-sr-comment"></i> -->
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
                <button class="cambiarAspecto" id="bossito3">
                    <i class="icon-minus"></i>
                </button>
                <button>
                    <i class="icon-cancel" id="bossito2"></i>
                </button>
            </div>
            <div class="viewMessages" id="viewMessages">
                <!--AQUÍ VA TODO EL CONTENIDO DEL CHATBOT-->
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