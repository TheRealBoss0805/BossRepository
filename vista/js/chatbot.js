
//===============ANTES DE ABRIR EL CHAT==============//

const closeMessage = function () {
    let messageInception = document.querySelector(".messageInception");
    messageInception.classList.remove("activado");
}

let ChatInception = () => {
    let messageInception = document.querySelector(".messageInception");
    messageInception.classList.add("activado");
}

//==================ABRIR CHAT===================

let theBoss = document.querySelector(".theBoss");
var intervalo;
var incremento = true;
let numClicks = 0;
let domContentLoadedTimeout;

theBoss.addEventListener("click", () => {
    numClicks++;
    var valor;
    let cosoAbrir = document.querySelector("#ventanaChat");

    function detener() {
        clearInterval(intervalo);
        incremento = true;
    }

    intervalo = setInterval(function () {
        if (incremento) {
            valor = 1;
        }
        else {
            valor++;
        }
        cosoAbrir.style.opacity = valor / 100;

        if (valor == 1) {
            cosoAbrir.style.display = "flex";
            incremento = false;

        }
        else if (valor == 100 && !incremento) {
            detener()
        }
    }, 0);

    closeMessage();
    msgIniciarChat();

});

document.addEventListener("DOMContentLoaded", () => {

    if (numClicks > 0) {
        return;
    }

    setTimeout(() => {
        if (numClicks === 0) {
            ChatInception();
        }
    }, 3000);
//CODIGO DE SEGURIDAD
    setTimeout(() => {
        clearTimeout(domContentLoadedTimeout);
    }, 5000);
});

//CODIGO DE SEGURIDAD
domContentLoadedTimeout = setTimeout(() => {

    document.removeEventListener("DOMContentLoaded", () => {
        console.log("DOMContentLoaded se ha removido");
    });
}, 5000);

function msgIniciarChat() {

    //FUNCIÓN PARA MOSTRAR EN PANTALLA LA ANIMACIÓN DEL CHATBOT
    //CUANDO SE OCULTE LA ANIMACIÓN SE RESOLVERÁ LA PROMESA.
    //Y SE PROCEDERÁ A EJECUTAR LA FUNCIÓN SALUDAR()

    function typingAnimation() {
        return new Promise((resolve, reject) => {
            var datos = new FormData();
            datos.append("loader", true);
            $.ajax({
                url: "ajax/chatbot.ajax.php",
                method: "POST",
                cache: false,
                data: datos,
                contentType: false,
                processData: false,
                success: function ($respuesta) {
                    $(document).on('DOMNodeInserted', '.desaparecerLoader', function (event) {
                        setTimeout(function () {
                            $(event.target).hide();
                            resolve();
                        }, 1500);
                    });
                    var $respuesta = $("<div class='container_msg_bot desaparecerLoader'><div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div><div class='msg_bot contenedorLoader'><div class='loader'></div></div></div></div>");
                    $('#viewMessages').append($respuesta);
                    scrollAbajo();
                },
                error: function (error) {
                    console.error(error);
                    reject(error);
                }
            });
        });
    }

    //FUNCIÓN QUE SALUDAR AL USUARIO QUE POSEE UN CALLBACK COMO ARGUMENTO
    //CUYA FUNCIÓN ES ASEGURARSE DE QUE LA OPERACIÓN ACTUAL TERMINE DE EJECUTARSE 
    //CORRECTAMENTE PARA LLAMAR DE NUEVO A LA FUNCIÓN TYPINGANIMATION()

    function saludar(callback) {
        var datos = new FormData();
        datos.append("saludar", true);
        $.ajax({
            url: "ajax/chatbot.ajax.php",
            method: "POST",
            cache: false,
            data: datos,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                $("#viewMessages").append(respuesta);
                scrollAbajo();
                callback();
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    //UNA VEZ QUE NUEVAMENTE SE OCULTÓ LA ANIMACIÓN, SE PROCEDE A RESOLVER
    //LA PROMESA Y SE EJECUTA RECIEN LA FUNCIÓN PEDIRNOMBRE()

    function pedirNombre() {
        var datos = new FormData();
        datos.append("pedirNombre", true);
        $.ajax({
            url: "ajax/chatbot.ajax.php",
            method: "POST",
            cache: false,
            data: datos,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                $("#viewMessages").append(respuesta);
                scrollAbajo();
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    //AQUI UTILIZAMOS LAS 2 PROMESAS Y EL CALLBACK NECESARIOS
    //PARA QUE LA SINCRONIZACIÓN SE RESUELVA CON ÉXITO. ATTE BIGPIG.

    typingAnimation()
        .then(() => {
            return new Promise((resolve, reject) => {
                saludar(() => {
                    typingAnimation()
                        .then(() => {
                            pedirNombre();
                            resolve();
                        });
                });
            });
        })
        .catch((error) => {
            console.error(error);
        });

}

let minimizar2 = document.querySelector("#bossito2");

//CUANDO DAMOS (X) AL CHATBOT Y NOS SALIMOS SE CIERRA SESION

minimizar2.addEventListener("click", () => {
    let cosoAbrir = document.querySelector("#ventanaChat");
    cosoAbrir.style.display = "none";
    var msg = "salir";
    var medio = "desdeBoton";
    var datos = new FormData();
    datos.append("msg", msg);
    datos.append("medio", medio);
    $.ajax({
        url: "ajax/chatbot.ajax.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#viewMessages").html(respuesta);
            scrollAbajo();
        }
    });
});

let minimizar3 = document.querySelector("#bossito3");

//CUANDO MINIMIZAMOS EL CHATBOT

minimizar3.addEventListener("click", () => {
    let cosoAbrir = document.querySelector("#ventanaChat");
    cosoAbrir.style.display = "none";
});

$(".viewMessages").on("click", ".container_msg_bot .opciones a", function () {
    $(this).parent().parent().parent().parent().append("<div class='msg_client'>" + $(this).text() + "<div class = 'print_hour'>" + getHora() + "</div></div>");
    enviarMensaje($(this).text());
    scrollAbajo();
});

function scrollAbajo() {
    $("#viewMessages").animate({
        scrollTop: $("#viewMessages").prop("scrollHeight")
    }, {
        duration: 1e3 / 2,
        easing: 'linear'
    });
}

function enviarMensaje(msg) {

    function typingAnimation() {
        return new Promise((resolve, reject) => {
            var datos = new FormData();
            datos.append("loader", true);
            $.ajax({
                url: "ajax/chatbot.ajax.php",
                method: "POST",
                cache: false,
                data: datos,
                contentType: false,
                processData: false,
                success: function ($respuesta) {
                    $(document).on('DOMNodeInserted', '.desaparecerLoader', function (event) {
                        setTimeout(function () {
                            $(event.target).hide();
                            resolve();
                        }, 1500);
                    });
                    var $respuesta = $("<div class='container_msg_bot desaparecerLoader'><div class='container_img_bot'><img src='vista/imagenes/chatbot/botIcono.png' alt=''></div><div class='msg_bot contenedorLoader'><div class='loader'></div></div></div></div>");
                    $('#viewMessages').append($respuesta);
                    scrollAbajo();
                },
                error: function (error) {
                    console.error(error);
                    reject(error);
                }
            });
        });
    }

    function arrojarMensaje(callback) {
        var datos = new FormData();
        datos.append("msg", msg);
        $.ajax({
            url: "ajax/chatbot.ajax.php",
            method: "POST",
            cache: false,
            data: datos,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                $("#viewMessages").append(respuesta);
                scrollAbajo();
                if ($("#viewMessages .container_msg_bot:last").prev().children(".msg_bot").children(".carusel").length > 0) {
                    sliderChat();
                }
                callback();
            }
        });
    }

    typingAnimation().
        then(() => {
            return new Promise((resolve, reject) => {
                arrojarMensaje(() => {
                    resolve()
                })
            })
        })
}

$("#btnEnviar").on("click", function () {
    if ($("#inputMsg").val().trim() != "") {
        var msg = $("#inputMsg").val().trim();
        $("#inputMsg").val("");
        $("#viewMessages").append("<div class='msg_client'>" + msg + "<div class='print_hour'>" + getHora() + "</div></div>");
        enviarMensaje(msg);
    }
});

$(document).ready(function () {
    $("#inputMsg").keypress(function (e) {
        if (e.keyCode == 13) {
            if ($("#inputMsg").val().trim() != "") {
                var msg = $("#inputMsg").val().trim();
                $("#inputMsg").val("");
                $("#viewMessages").append("<div class='msg_client'>" + msg + "<div class='print_hour'>" + getHora() + "</div>");
                enviarMensaje(msg);
                scrollAbajo();
            }
        }
    });
});

/*=============SLIDER CHATBOT===============*/

function sliderChat() {
    console.log("Función SliderChat");
    $(".listado").children("li").addClass("itemCarusel");

    $(".listado:last .itemCarusel").first().addClass("active");

    let iterador = 0;

    $(".viewMessages").on("click", ".container_msg_bot .icon-left-dir", function () {
        prevSlide2(this);
    });
    $(".viewMessages").on("click", ".container_msg_bot .icon-right-dir", function () {
        nextSlide2(this);
    });

    function prevSlide2(element) {
        if (iterador === 0) {
            iterador = $(element).parent().parent().children(".carusel").children(".listado").children(".itemCarusel").length - 1;
        } else {
            iterador--;
        }
        changeSlide2(element);
    }

    function nextSlide2(element) {
        if (iterador === $(element).parent().parent().children(".carusel").children(".listado").children(".itemCarusel").length - 1) {
            iterador = 0;
        } else {
            iterador++;
        }
        changeSlide2(element);
    }

    function changeSlide2(element) {

        $(element).parent().parent().children(".carusel").children(".listado").children(".itemCarusel").removeClass("active");
        if (iterador < 0) {
            iterador = 3;
        }
        if (iterador > 3) {
            iterador = 0;
        }
        $(element).parent().parent().children(".carusel").children(".listado").children(".itemCarusel").eq(iterador).addClass("active");
    }

}
function getHora() {
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    // Check whether AM or PM
    var newformat = hours >= 12 ? 'pm' : 'am';

    // Find current hour in AM-PM Format
    hours = hours % 12;

    // To display "0" as "12"
    hours = hours ? hours : 12;
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;


    var hora = hours + ':' + minutes + ':' + seconds + ' ' + newformat;
    return hora;

}

