
document.addEventListener("DOMContentLoaded", () => {
    let scrollText = document.querySelector(".scrollText");
    let parrafoServicio = document.querySelectorAll(".parrafoServicio");
    let arregloParrafo = [];
    let sumaArreglo = 0;
    let iterador = 0;
    let longitud
    parrafoServicio.forEach((item) => {
        iterador++
        longitud = item.innerHTML.trim().length;
        arregloParrafo.push(longitud);
        sumaArreglo += arregloParrafo[iterador - 1];
    })

    if (sumaArreglo < 1250) {
        scrollText.classList.add("ocultarScroll");
    }
    else {
        scrollText.classList.remove("ocultarScroll");
    }

});