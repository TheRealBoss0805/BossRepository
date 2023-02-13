
/*=============código para pintar las opciones del navegador cuando estemos
en una de ellas.================================*/

let prueba = document.getElementById("ruta");
let ruta = prueba.getAttribute("value");

let URLactual = window.location.search;
let ruta2;

if (ruta == null) {
    ruta = "inicio";
}
else if (ruta == "servicios" || ruta == "servicios-eleccion") {
    ruta = "servicios";
}
else if (ruta == "proyectos" || ruta == "proyecto-eleccion") {
    ruta = "proyectos";
}
else if (ruta == "blog" || ruta == "blog-seleccion") {
    ruta = "blog"
}


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

let printed = document.getElementById(ruta);
printed.classList.add("active");

let printed2 = document.getElementById(ruta2);
printed2.classList.add("changed");



