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
    <input type="checkbox" id="bossito" class="cambiarAspecto">
    <label for="bossito" class="theBoss">

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
                <!--<button>
                    <i class="icon-volume-off-4" id="volumen"></i>
                </button>-->
                <button class="cambiarAspecto" id="bossito3">
                    <i class="icon-minus"></i>
                </button>
                <button>
                    <i class="icon-cancel" id="bossito2"></i>
                </button>
            </div>
            <!--<div class="disenio-olas">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#203A43" fill-opacity="1" d="M0,128L80,122.7C160,117,320,107,480,138.7C640,171,800,245,960,277.3C1120,309,1280,299,1360,293.3L1440,288L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
                    </path>
                </svg>
            </div>-->
            <div class="viewMessages" id="viewMessages">

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