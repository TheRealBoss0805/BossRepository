window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("abajo", window.scrollY > 0);
})
/*
var now, then;

now = document.getElementsByClassName("responsive");

if(now.style.){

}*/