
/*código para pintar las opciones del navegador cuando estemos
en una de ellas.*/

let ruta = document.getElementById("ruta");

if(ruta == null){
    ruta = "inicio";
}
else if(ruta == "servicios" || ruta == "servicios-eleccion"){
    ruta = "servicios";
}
else if(ruta == "proyectos" || ruta == "proyecto-eleccion"){
    ruta = "proyectos";
}
else if(ruta == "blog" || ruta == "blog-seleccion"){
    ruta = "blog"
}

let printed = document.getElementById(ruta.value);
printed.classList.add("active");


