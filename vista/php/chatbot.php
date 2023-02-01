<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="vista/css/chatbot.css">
        <title>chatbot</title>
    </head>
    <body>
        
        <div class="contenedor-chatbot">
            <input type="checkbox" id="bossito">
            <label for="bossito" class="theBoss">
                <img src="vista/imagenes/chatbot/botIcono.png" alt="">
            </label>
            <div class="content-chatbot" id="ventanaChat">
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
                    <button id="minimizar">
                        <i class="icon-minus"></i>
                    </button>
                    <button>
                        <i class="icon-cancel" id="cancelar"></i>
                    </button>
                </div>
                <div class="viewMessages">

                </div>
                <div class="interaction">
                    <input type="text" placeholder="Escribe tu mensaje aquí.">
                    <span class="icon-direction-1"></span>
                </div>
            </div>
        </div>
        </body>
        <script src="vista/js/chatbot.js"></script>

</html>