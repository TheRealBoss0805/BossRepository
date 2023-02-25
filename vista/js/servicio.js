
function calcularValoresRespuesta(e) {
    let valorSelect1 = document.getElementById("ubicacionServicio").value;
    let valorSelect2 = document.getElementById("estadoServicio").value;
    let elemRespuesta = document.getElementById("botonServicio");

    if ((valorSelect1 != "" || valorSelect2 != "") && (valorSelect1 != "Ubicación" || valorSelect2 != "Estado")) {
        elemRespuesta.innerText = "Se muestra el proyecto de " + valorSelect1 + " con estado " + valorSelect2;
    }
    if(valorSelect1 == "Ubicación" && valorSelect2 != "Estado"){
        elemRespuesta.innerText = "Se muestran todos los proyectos con estado " + valorSelect2;
    }
    if(valorSelect2 == "Estado" && valorSelect1 != "Ubicación"){
        elemRespuesta.innerText = "Se muestra el proyecto de " + valorSelect1 + " con estado: En proceso y culminado";
    }
    if(valorSelect1 == "Ubicación" && valorSelect2 == "Estado"){
        elemRespuesta.innerText = "Mostrando todos los proyectos";
    }

    let valoresSelect = valorSelect1.concat('', valorSelect2);

    document.querySelectorAll(".item").forEach(item => {

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
    })
}
document.getElementById("ubicacionServicio").addEventListener("change", calcularValoresRespuesta);
document.getElementById("estadoServicio").addEventListener("change", calcularValoresRespuesta);


