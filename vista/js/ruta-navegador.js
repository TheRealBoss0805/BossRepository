
/*código para pintar las opciones del navegador cuando estemos
en una de ellas.*/

let prueba = document.getElementById("ruta");
ruta = prueba.getAttribute("value");

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

let printed = document.getElementById(ruta);
printed.classList.add("active");


