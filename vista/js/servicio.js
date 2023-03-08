
function calcularValoresRespuesta() {
    let valorSelect1 = document.getElementById("ubicacionServicio").value;
    let valorSelect2 = document.getElementById("estadoServicio").value;
    let elemRespuesta = document.getElementById("botonServicio");
    let nothingItem = document.querySelector(".nothingItem");
    let arregloClase = [];

    if ((valorSelect1 != "" || valorSelect2 != "") && (valorSelect1 != "Ubicación" || valorSelect2 != "Estado")) {
        elemRespuesta.innerHTML = "<p>Se muestra el proyecto de <span>" + valorSelect1 + "</span> con estado <span>" + valorSelect2 + "</span></p>";
    }
    if (valorSelect1 == "Ubicación" && valorSelect2 != "Estado") {
        elemRespuesta.innerHTML = "<p>Se muestran todos los proyectos con estado <span>" + valorSelect2 + "</span></p>";
    }
    if (valorSelect2 == "Estado" && valorSelect1 != "Ubicación") {
        elemRespuesta.innerHTML = "<p>Se muestra el proyecto de <span>" + valorSelect1 + "</span> con estado: <span>En proceso</span> y <span>culminado</span></p>";
    }
    if (valorSelect1 == "Ubicación" && valorSelect2 == "Estado") {
        elemRespuesta.innerHTML = "<p>Mostrando todos los proyectos</p>";
    }

    let valoresSelect = valorSelect1.concat('', valorSelect2);

    document.querySelectorAll(".item").forEach((item) => {

        let cadena1 = item.getAttribute("valor");
        let cadena2 = item.getAttribute("valor2");
        let valorContenedor = cadena1.concat('', cadena2);
        let padreContenedor = item.parentElement;
        let todoRegionItem = cadena1.concat('', "Estado");

        if (valoresSelect == valorContenedor) {
            padreContenedor.style.display = "flex";
        }
        if (valoresSelect != valorContenedor && valoresSelect != "UbicaciónEstado") { 
            padreContenedor.style.display = "none";
        }
        if (valoresSelect == "UbicaciónEstado") {
            padreContenedor.style.display = "flex";
        }
        if (valoresSelect == "Ubicaciónen proceso") {
            if (valorSelect2 == cadena2) {
                padreContenedor.style.display = "flex";
            }
        }
        if (valoresSelect == "Ubicaciónculminado") {
            if (valorSelect2 == cadena2) {
                padreContenedor.style.display = "flex";
            }
        }
        if (valoresSelect == todoRegionItem) {
            if (valorSelect1 == cadena1) {
                padreContenedor.style.display = "flex";
            }
        }

        let iteradorArreglo = padreContenedor.style.display;
        arregloClase.push(iteradorArreglo);

    })

    if (arregloClase.every((item) => item == "none")) {
        nothingItem.style.display = "grid";
    }
    else if(arregloClase.some((item) => item == "flex")){
        nothingItem.style.display = "none";
    }
}

document.getElementById("ubicacionServicio").addEventListener("change", calcularValoresRespuesta);
document.getElementById("estadoServicio").addEventListener("change", calcularValoresRespuesta);


