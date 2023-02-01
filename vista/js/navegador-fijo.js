
/*para la cabecera fija*/

const cabecera = () => {
    var header = document.querySelector("header");
    header.classList.toggle("abajo", window.scrollY > 0);
}

window.addEventListener("scroll", cabecera);


/*CODIGO PARA EL CAMBIO DE ICONO (+) (-) CUANDO EL INPUT ESTÉ CHECKEADO*/

let checkbox = document.getElementById("check2");
let checkbox2 = document.getElementById("check3");
let checkbox3 = document.getElementById("check4");

const validarcheck = () => {
    let forma = document.getElementById("forma");
    let checkeado = checkbox.checked;
    checkeado ? forma.classList.replace("icon-plus", "icon-minus") : forma.classList.replace("icon-minus", "icon-plus");
}

checkbox.addEventListener("change", validarcheck);


const validarcheck2 = () => {
    let forma = document.getElementById("forma1");
    let checkeado = checkbox2.checked;
    checkeado ? forma.classList.replace("icon-plus", "icon-minus") : forma.classList.replace("icon-minus", "icon-plus");
}

checkbox2.addEventListener("change", validarcheck2);


const validarcheck3 = () => {
    let forma = document.getElementById("forma2");
    let checkeado = checkbox3.checked;
    checkeado ? forma.classList.replace("icon-plus", "icon-minus") : forma.classList.replace("icon-minus", "icon-plus");
}

checkbox3.addEventListener("change", validarcheck3);


