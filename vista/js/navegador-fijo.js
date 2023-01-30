window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("abajo", window.scrollY > 0);
})
/*
var now, then;

now = document.getElementsByClassName("responsive");

if(now.style.){

}*/

/*CODIGO PARA EL CAMBIO DE ICONO (+) (-) CUANDO EL INPUT ESTÉ CHECKEADO*/



var checkbox = document.getElementById("check2");
var forma = document.getElementById("forma");
checkbox.addEventListener("click", validacheckbox, false);
function validacheckbox(){
    var checkeado = checkbox.checked;
    if(checkeado){
        forma.classList.replace("icon-plus","icon-minus");
    }
    else{
        forma.classList.replace("icon-minus","icon-plus");
    }
}
/*
var checkbox1 = document.getElementById("check3");
var forma1 = document.getElementById("forma1")
checkbox1.addEventListener("change", validacheckbox1, false);
function validacheckbox1(){
    var checkeado = checkbox1.checked;
    if(checkeado){
        forma1.classList.replace("icon-plus","icon-minus");
    }
    else{
        forma1.classList.replace("icon-minus","icon-plus");
    }
}

var checkbox2 = document.getElementById("check4");
var forma2 = document.getElementById("forma2")
checkbox2.addEventListener("change", validacheckbox2, false);
function validacheckbox2(){
    var checkeado = checkbox2.checked;
    if(checkeado){
        forma2.classList.replace("icon-plus","icon-minus");
    }
    else{
        forma2.classList.replace("icon-m9inus","icon-plus");
    }
}*/
