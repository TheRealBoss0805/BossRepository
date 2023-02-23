/*=============código para pintar las opciones del navegador cuando estemos
en una de ellas.================================*/

let URLactual = window.location.search;
let prueba = document.getElementById("ruta");
let ruta = prueba.getAttribute("value");
let ruta2 = "";
let eleccionServicio = document.querySelector(".content-eleccion-servicio");
let eleccionProyecto = document.querySelector(".content-eleccion-proyecto");

const urlServicioItem = () => {
    if (eleccionServicio.parentElement.getAttribute("id") == 1) {
        ruta2 = "serv1";
    }
    else if (eleccionServicio.parentElement.getAttribute("id") == 2) {
        ruta2 = "serv2";
    }
    else if (eleccionServicio.parentElement.getAttribute("id") == 3) {
        ruta2 = "serv3";
    }
    else if (eleccionServicio.parentElement.getAttribute("id") == 4) {
        ruta2 = "serv4";
    }
    let printed = document.getElementById(ruta2);
    printed.classList.add("changed");
}

const urlProyectoItem = () => {
    if (eleccionProyecto.parentElement.getAttribute("id") == 1) {
        ruta2 = "proy1";
    }
    else if (eleccionProyecto.parentElement.getAttribute("id") == 2) {
        ruta2 = "proy2";
    }

    let printed = document.getElementById(ruta2);
    printed.classList.add("changed");
}

const urlMarcadoHijo = () => {
    if (URLactual == "?ruta=servicios&id=1") {
        ruta2 = "serv1";
    }
    else if (URLactual == "?ruta=servicios&id=2") {
        ruta2 = "serv2";
    }
    else if (URLactual == "?ruta=servicios&id=3") {
        ruta2 = "serv3";
    }
    else if (URLactual == "?ruta=servicios&id=4") {
        ruta2 = "serv4";
    }
    else if (URLactual == "?ruta=proyectos&id=1") {
        ruta2 = "proy1";
    }
    else if (URLactual == "?ruta=proyectos&id=2") {
        ruta2 = "proy2";
    }
    else if (URLactual == "?ruta=nosotros&1") {
        ruta2 = "us1";
    }
    else if (URLactual == "?ruta=nosotros&2") {
        ruta2 = "us2";
    }

    let printed = document.getElementById(ruta2);
    printed.classList.add("changed");
}

const urlMarcadoPadre = () => {
    if (ruta == null) {
        ruta = "inicio";
    }
    else if (ruta == "servicios") {
        urlMarcadoHijo();
        ruta = "servicios"
    }
    else if (ruta == "servicios-eleccion") {
        urlServicioItem();
        ruta = "servicios";
    }
    else if (ruta == "proyectos") {
        urlMarcadoHijo();
        ruta = "proyectos";
    }
    else if (ruta == "proyecto-eleccion") {
        urlProyectoItem();
        ruta = "proyectos";
    }
    else if (ruta == "blog" || ruta == "blog-seleccion") {
        ruta = "blog"
    }
    else if (ruta == "nosotros") {
        urlMarcadoHijo();
    }

    let printed = document.getElementById(ruta);
    printed.classList.add("active");
}

/*============EJECUTAMOS LA FUNCIÓN PRINCIPAL===========*/
urlMarcadoPadre();
/*====================END===============================*/



















