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
    console.log("Me presionaste en la X");
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
    $(this).parent().parent().parent().parent().append("<div class='msg_client'>" + $(this).text() + "</div>");
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
                sliderChat();
            }
        });
    }, "1000");
}

$("#btnEnviar").on("click", function () {
    if ($("#inputMsg").val().trim() != "") {
        var msg = $("#inputMsg").val().trim();
        $("#inputMsg").val("");
        $("#viewMessages").append("<div class='msg_client'>" + msg + "</div>");
        enviarMensaje(msg);
    }
});
$(document).ready(function () {
    $("#inputMsg").keypress(function (e) {
        if (e.keyCode == 13) {
            if ($("#inputMsg").val().trim() != "") {
                var msg = $("#inputMsg").val().trim();
                $("#inputMsg").val("");
                $("#viewMessages").append("<div class='msg_client'>" + msg + "</div>");
                enviarMensaje(msg);
                scrollAbajo();
            }
        }
    });
});

/*=============SLIDER CHATBOT===============*/

function sliderChat() {

    $(".listado").children("li").addClass("itemCarusel");

    let slide = $(".listado .itemCarusel")
    /*console.log($(".itemCarusel:first"));
    slide[0].classList.add("active");
    $(".itemCarusel:first").css("display", "flex");*/
    $(".listado .itemCarusel").first().addClass("active");

    let iterador = 0;

    $(".viewMessages").on("click", ".container_msg_bot .icon-left-dir", function () {
        console.log("123456789")
        prevSlide2();
        resetTimer2();
    });
    $(".viewMessages").on("click", ".container_msg_bot .icon-right-dir", function () {
        console.log("987654321")
        nextSlide2();
        resetTimer2();
    });

    function prevSlide2() {
        if (iterador === 0) {
            iterador = slide.length - 1;
        } else {
            iterador--;
        }
        changeSlide2();
    }

    function nextSlide2() {
        if (iterador === slide.length - 1) {
            iterador = 0;
        } else {
            iterador++;
        }
        changeSlide2();
    }

    function changeSlide2() {
        for (let i = 0; i < slide.length; i++) {
            $(".listado .itemCarusel").eq(i).removeClass("active");
            /*slide[i].classList.remove("active");*/
        }
        if (iterador === -1) {
            iterador = 3;
        }
        if (iterador === 4) {
            iterador = 0;
        }
            $(".listado .itemCarusel").eq(iterador).addClass("active");
            /*slide[iterador].classList.add("active");*/
    }

    function resetTimer2() {
        clearInterval(tiempo);
        tiempo = setInterval(autoPlay2, 4000);
    }

    function autoPlay2() {
        nextSlide2();
    }

    let tiempo = setInterval(autoPlay2, 4000);

}

