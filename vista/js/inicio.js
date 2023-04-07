
const slides = document.querySelector(".slider").children;
const prev = document.querySelector(".icon-left-dir");
const next = document.querySelector(".icon-right-dir");
const indicator = document.querySelector(".indicator");

slides[0].classList.add("active");

let index = 0;

prev.addEventListener("click", function () {
    prevSlide();
    updateCircleIndicator();
    resetTimer();
});

next.addEventListener("click", function () {
    nextSlide();
    updateCircleIndicator();
    resetTimer();
});

//create circle indicators
function circleIndicator() {
    for (let i = 0; i < slides.length; i++) {
        const div = document.createElement("div");
        div.setAttribute("onclick", "indicateSlide(this)");
        div.id = i;
        if (i === 0) {
            div.className = "active";
        }
        indicator.appendChild(div);
    }
}

circleIndicator();

function indicateSlide(element) {
    index = element.id;
    changeSlide();
    updateCircleIndicator();
    resetTimer();
}

function updateCircleIndicator() {
    for (let i = 0; i < indicator.children.length; i++) {
        indicator.children[i].classList.remove("active");
    }
    indicator.children[index].classList.add("active");
}

function prevSlide() {
    if (index === 0) {
        index = slides.length - 1;
    } else {
        index--;
    }

    changeSlide();
}

function nextSlide() {

    if (index === slides.length - 1) {
        index = 0;
    } else {
        index++;
    }
    changeSlide();
}

function changeSlide() {
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }

    if (index === -1) {
        index = 7;
    }

    if (index === 8) {
        index = 0;
    }

    slides[index].classList.add("active");
}

function resetTimer() {
    clearInterval(timer);
    timer = setInterval(autoPlay, 6000);
}

function autoPlay() {
    nextSlide();
    updateCircleIndicator();
}

let timer = setInterval(autoPlay, 6000);

/*======INICIO 2 - SERVICIOS=======

/*CARRUSEL CON SWIPER*/

let cambioWindow = document.getElementById("swiperGtfo");
let slidesPerView = [3, 2, 1];
let mostrador;

const reziseWindow = () => {

    let ancho = document.documentElement.clientWidth;

    if (ancho >= 1395) {
        mostrador = slidesPerView[0];
        /*console.log("rivera");
        console.log(ancho);*/
    }
    if (ancho >= 755 && ancho < 1395) {
        mostrador = slidesPerView[1];
        cambioWindow.classList.replace("maximum", "medium");
        /*console.log("rivera1");
        console.log(ancho);*/
    }
    if (ancho >= 0 && ancho < 755) {
        mostrador = slidesPerView[2];
        cambioWindow.classList.replace("maximum", "minimum");
        /*console.log("rivera2");
        console.log(ancho);*/
    }
}

window.addEventListener("resize", reziseWindow);
reziseWindow();

var swiper = new Swiper(".mySwiper", hola = {
    slidesPerView: mostrador,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: false,
    loopFillGroupWithBlank: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

/*INICIO 5 - BURBUJAS*/

let color = document.querySelectorAll(".burbujaColor");
let valor = document.querySelectorAll(".valor");

for (let i = 0; i < 4; i++) {
    switch (i) {
        case 0:
            color[i].style = "--clr:#ff0f5b;";
            valor[i].textContent = "Respeto";
            break;
        case 1:
            color[i].style = "--clr:#be01fe;";
            valor[i].textContent = "Honestidad";
            break;
        case 2:
            color[i].style = "--clr:#01b4ff;";
            valor[i].textContent = "Responsabilidad";
            break;
        case 3:
            color[i].style = "--clr:#d1b957;";
            valor[i].textContent = "Cumplimiento";
            break;
    }
}

/*RULETA ISO*/

let iso = document.querySelectorAll(".iso");
let isoInfo = document.querySelectorAll(".isoInfo");

for (let i = 0; i < 5; i++) {
    switch (i) {
        case 0:
            iso[i].textContent = "Aniversario";
            isoInfo[i].textContent = "26 Años de servicio en todo el Perú";
            break;
        case 1:
            iso[i].textContent = "ISO 9001:2015";
            isoInfo[i].textContent = "Sistemas de Gestión de calidad (SGC)";
            break;
        case 2:
            iso[i].textContent = "ISO 14001:2015";
            isoInfo[i].textContent = "Sistemas de Gestión Ambiental (SGA)";
            break;
        case 3:
            iso[i].textContent = "ISO 37001:2016";
            isoInfo[i].textContent = "Sistemas de Gestión Antisoborno";
            break;
        case 4:
            iso[i].textContent = "ISO 45001:2018";
            isoInfo[i].textContent = "Sistemas de Gestión de la Seguridad y Salud ene el Trabajo";
            break;
    }
}

let imgBx = document.querySelectorAll('.imgBx');
let contentBx = document.querySelectorAll('.contentBx');
imgBx[0].classList.add("active");
contentBx[0].classList.add("active");

for (let i = 0; i < imgBx.length; i++) {
    imgBx[i].addEventListener('mouseover', function () {
        for (let i = 0; i < contentBx.length; i++) {
            contentBx[i].className = 'contentBx';
        }
        document.getElementById(this.dataset.id).className = 'contentBx active';
        for (let i = 0; i < imgBx.length; i++) {
            imgBx[i].className = 'imgBx';
        }
        this.className = 'imgBx active';
    })
}

document.querySelectorAll(".card").forEach(element => {
    let icono = element.querySelector(".icon-plus");
    icono.addEventListener("click", () => {
        icono.classList.toggle("icon-minus");
        if (icono.classList.contains("icon-minus")) {
            Array.from(icono.parentElement.children).forEach((elemento) => {
                if (elemento.classList.contains("card-down")) {
                    elemento.style.visibility = "hidden";
                }
                if (elemento.classList.contains("card-content")) {
                    elemento.style.height = "100%";
                }
            })
        }
        else if (!icono.classList.contains("icon-minus")) {
            Array.from(icono.parentElement.children).forEach((elemento) => {
                if (elemento.classList.contains("card-down")) {
                    elemento.style.visibility = "visible";
                }
                if (elemento.classList.contains("card-content")) {
                    elemento.style.height = "180px";
                }
            })
        }
    })
});



const { documentObserver } = require("vista/js/documentOberser.js")
































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































