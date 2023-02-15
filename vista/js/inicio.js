
const slides = document.querySelector(".slider").children;
const prev = document.querySelector(".icon-left-dir");
const next = document.querySelector(".icon-right-dir");
const indicator = document.querySelector(".indicator");
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
        index = 9;
    }

    if (index === 10) {
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


/*
const before = document.querySelector('.before');
const after = document.querySelector('.after');
const carusel = document.querySelector('.slider-inicio-tercero');

before.addEventListener('click', () => {
    carusel.scrollLeft -=400
})

after.addEventListener('click', () => {
    carusel.scrollLeft += 400
})
*/


/*CARRUSEL CON SWIPER*/


/*if(ancho >= 1200){
    mostrador = slidesPerView[0];
}
if(ancho >= 650 && ancho < 1200){
    mostrador = slidesPerView[1];
    cambioWindow.classList.replace("maximum", "medium");
}
if(ancho >= 0 && ancho < 650){
    mostrador = slidesPerView[2];
    cambioWindow.classList.replace("maximum", "minimum");
}*/
let cambioWindow = document.getElementById("swiperGtfo");
let slidesPerView = [3, 2, 1];
let mostrador;

const reziseWindow = () => {

    let ancho = document.documentElement.clientWidth;

    if (ancho >= 1200) {
        mostrador = slidesPerView[0];
        console.log("rivera");
        console.log(ancho);
    }
    if (ancho >= 755 && ancho < 1200) {
        mostrador = slidesPerView[1];
        cambioWindow.classList.replace("maximum", "medium");
        console.log("rivera1");
        console.log(ancho);
    }
    if (ancho >= 0 && ancho < 755) {
        mostrador = slidesPerView[2];
        cambioWindow.classList.replace("maximum", "minimum");
        console.log("rivera2");
        console.log(ancho);
    }
}

window.addEventListener("resize", reziseWindow);

var swiper = new Swiper(".mySwiper", hola = {
    slidesPerView: reziseWindow(),
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



/*RULETA ISO*/

let imgBx = document.querySelectorAll('.imgBx');
let contentBx = document.querySelectorAll('.contentBx');

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

/*Modificar altura del carrusel de trabajos recientes*/


/*Contador de proyecto, etc

let count1 = document.getElementById('count1'),
    count2 = document.getElementById('count2'),
    count3 = document.getElementById('count3'),
    count4 = document.getElementById('count4');
let time = 50;
let contador1 = 0, contador2 = 0, contador3 = 0, contador4 = 0;

let tiempo1 = setInterval(() => {
    count1.textContent = contador1 += 20
    if (contador1 === 1500) {
        clearInterval(tiempo1)
    }
}, `${time}`);

let tiempo2 = setInterval(() => {
    count2.textContent = contador2 += 19
    if (contador2 === 1995) {
        clearInterval(tiempo2)
    }
}, `${time}`);

let tiempo3 = setInterval(() => {
    count3.textContent = contador3 += 5
    if (contador3 === 100) {
        clearInterval(tiempo3)
    }
}, `${time}`);

let tiempo4 = setInterval(() => {
    count4.textContent = contador4 += 1
    if (contador4 === 28) {
        clearInterval(tiempo4)
    }
}, `${time}`);
*/


/*Bloque para que la animación se de cuando el scroll
Muestre el sector respectivo en la pantalla*/

addEventListener('DOMContentLoaded', () => {
    const contadorcitos = document.querySelectorAll('.count-cantidad')
    const rapidez = 1000

    const animarContadores = () => {
        for (const contadorsote of contadorcitos) {
            const actualizar_contador = () => {
                let cantidad_maxima = +contadorsote.dataset.cantidadTotal,
                    valor_actual = +contadorsote.innerText,
                    incremento = cantidad_maxima / rapidez

                if (valor_actual < cantidad_maxima) {
                    contadorsote.innerText = Math.ceil(valor_actual + incremento)
                    setTimeout(actualizar_contador, 100)
                } else {
                    contadorsote.innerText = cantidad_maxima
                }
            }
            actualizar_contador()
        }
    }
    //IntersectionObserver

    const mostrarContadores = elementos => {
        elementos.forEach(elemento => {
            if (elemento.isIntersecting) {
                elemento.target.classList.add('jugar')
                elemento.target.classList.remove('hideee')
                setTimeout(animarContadores, 300)
            }
        });
    }

    const observer = new IntersectionObserver(mostrarContadores, {
        threshold: 0.75 // 0 - 1
    })

    const elementosHTML = document.querySelectorAll('.hijo-contador')
    elementosHTML.forEach(elementoHTML => {
        observer.observe(elementoHTML)
    })
})

/*CODIGO PARA EL CAMBIO DE ICONO (+) (-) CUANDO EL INPUT ESTÉ CHECKEADO*/

let despliege1 = document.getElementById("name-profession1");

const desplegarCambiar1 = () => {
    let iconodesp = document.getElementById("icon-1");
    let desplegado = despliege1.checked;
    desplegado ? iconodesp.classList.replace("icon-plus", "icon-minus") : iconodesp.classList.replace("icon-minus", "icon-plus");
    iconodesp.classList.toggle("red");
}

despliege1.addEventListener("change", desplegarCambiar1);

let despliege2 = document.getElementById("name-profession2");

const desplegarCambiar2 = () => {
    let iconodesp = document.getElementById("icon-2");
    let desplegado = despliege2.checked;
    desplegado ? iconodesp.classList.replace("icon-plus", "icon-minus") : iconodesp.classList.replace("icon-minus", "icon-plus");
    iconodesp.classList.toggle("red");
}

despliege2.addEventListener("change", desplegarCambiar2);

let despliege3 = document.getElementById("name-profession3");

const desplegarCambiar3 = () => {
    let iconodesp = document.getElementById("icon-3");
    let desplegado = despliege3.checked;
    desplegado ? iconodesp.classList.replace("icon-plus", "icon-minus") : iconodesp.classList.replace("icon-minus", "icon-plus");
    iconodesp.classList.toggle("red");
}

despliege3.addEventListener("change", desplegarCambiar3);

let despliege4 = document.getElementById("name-profession4");

const desplegarCambiar4 = () => {
    let iconodesp = document.getElementById("icon-4");
    let desplegado = despliege4.checked;
    desplegado ? iconodesp.classList.replace("icon-plus", "icon-minus") : iconodesp.classList.replace("icon-minus", "icon-plus");
    iconodesp.classList.toggle("red");

}

despliege4.addEventListener("change", desplegarCambiar4);

let despliege5 = document.getElementById("name-profession5");

const desplegarCambiar5 = () => {
    let iconodesp = document.getElementById("icon-5");
    let desplegado = despliege5.checked;
    desplegado ? iconodesp.classList.replace("icon-plus", "icon-minus") : iconodesp.classList.replace("icon-minus", "icon-plus");
    iconodesp.classList.toggle("red");
}

despliege5.addEventListener("change", desplegarCambiar5);

let despliege6 = document.getElementById("name-profession6");

const desplegarCambiar6 = () => {
    let iconodesp = document.getElementById("icon-6");
    let desplegado = despliege6.checked;
    desplegado ? iconodesp.classList.replace("icon-plus", "icon-minus") : iconodesp.classList.replace("icon-minus", "icon-plus");
    iconodesp.classList.toggle("red");
}

despliege6.addEventListener("change", desplegarCambiar6);

let despliege7 = document.getElementById("name-profession7");

const desplegarCambiar7 = () => {
    let iconodesp = document.getElementById("icon-7");
    let desplegado = despliege7.checked;
    desplegado ? iconodesp.classList.replace("icon-plus", "icon-minus") : iconodesp.classList.replace("icon-minus", "icon-plus");
    iconodesp.classList.toggle("red");
}

despliege7.addEventListener("change", desplegarCambiar7);

let despliege8 = document.getElementById("name-profession8");

const desplegarCambiar8 = () => {
    let iconodesp = document.getElementById("icon-8");
    let desplegado = despliege8.checked;
    desplegado ? iconodesp.classList.replace("icon-plus", "icon-minus") : iconodesp.classList.replace("icon-minus", "icon-plus");
    iconodesp.classList.toggle("red");
}

despliege8.addEventListener("change", desplegarCambiar8);

let despliege9 = document.getElementById("name-profession9");

const desplegarCambiar9 = () => {
    let iconodesp = document.getElementById("icon-9");
    let desplegado = despliege9.checked;
    desplegado ? iconodesp.classList.replace("icon-plus", "icon-minus") : iconodesp.classList.replace("icon-minus", "icon-plus");
    iconodesp.classList.toggle("red");
}

despliege9.addEventListener("change", desplegarCambiar9);
































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































