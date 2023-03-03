let minimizar = document.querySelector("#bossito");
var intervalo;
var incremento = true;


function detener() {
    clearInterval(intervalo);
    incremento = true;
}

//==================ABRIR CHAT===================

const operacion = () => {
    var valor;
    let cosoAbrir = document.querySelector("#ventanaChat");
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
    msgIniciarChat();

}

function msgIniciarChat() {
    setTimeout(() => {
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
            }
        });
    }, "500");

    setTimeout(function () {
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
            }
        });
    }, "1500");
}

minimizar.addEventListener("click", operacion);



let minimizar2 = document.querySelector("#bossito2");

const operacion2 = () => {
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
}

minimizar2.addEventListener("click", operacion2);

let minimizar3 = document.querySelector("#bossito3");

const operacion3 = () => {
    let cosoAbrir = document.querySelector("#ventanaChat");
    cosoAbrir.style.display = "none";

}

minimizar3.addEventListener("click", operacion3);

$(".viewMessages").on("click", ".container_msg_bot .opciones a", function () {
    console.log("Me presionaste");
    $(this).parent().parent().parent().parent().append("<div class='msg_client'>" + $(this).text() + "<div class = 'print_hour'>"+getHora()+"</div></div>");
    enviarMensaje($(this).text());
    scrollAbajo();
});

function scrollAbajo() {
    $("#viewMessages").animate({ scrollTop: $("#viewMessages").prop("scrollHeight") }, 1e3 / 2);
}
function enviarMensaje(msg) {

    setTimeout(function () {
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
                console.log("Existencia del carrusel: "+$("#viewMessages .container_msg_bot:last").prev().children(".msg_bot").children(".carusel").length);
                if($("#viewMessages .container_msg_bot:last").prev().children(".msg_bot").children(".carusel").length > 0){

                    sliderChat();
                    
                }
            }
        });
    }, "1000");
    
}

$("#btnEnviar").on("click", function () {
    if ($("#inputMsg").val().trim() != "") {
        var msg = $("#inputMsg").val().trim();
        $("#inputMsg").val("");
        $("#viewMessages").append("<div class='msg_client'>" + msg + "<div class='print_hour'>"+getHora()+"</div></div>");
        enviarMensaje(msg);
    }
});
$(document).ready(function () {
    $("#inputMsg").keypress(function (e) {
        if (e.keyCode == 13) {
            if ($("#inputMsg").val().trim() != "") {
                var msg = $("#inputMsg").val().trim();
                $("#inputMsg").val("");
                $("#viewMessages").append("<div class='msg_client'>" + msg + "<div class='print_hour'>"+getHora()+"</div>");
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

    /*let slide = $(".listado .itemCarusel")
    console.log($(".itemCarusel:first"));
    slide[0].classList.add("active");
    $(".itemCarusel:first").css("display", "flex");*/
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
        if (iterador === $(element).parent().parent().children(".carusel").children(".listado").children(".itemCarusel").length- 1) {
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
function getHora(){
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

