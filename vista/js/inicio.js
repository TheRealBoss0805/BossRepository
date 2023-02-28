
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

/*======INICIO 2 - SERVICIOS=======*/

let colorServicio = document.querySelectorAll(".div-plus");

for (let i = 0; i < 4; i++) {
    switch (i) {
        case 0:
            colorServicio[i].style = "background: #9b133e;";
            break;
        case 1:
            colorServicio[i].style = "background: #8011a4;";
            break;
        case 2:
            colorServicio[i].style = "background: #1289bc;";
            break;
        case 3:
            colorServicio[i].style = "background: #aa8e1c;";
            break;
    }
}

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

/*Bloque para que la animación se de cuando el scroll
Muestre el sector respectivo en la pantalla*/

addEventListener('DOMContentLoaded', () => {
    const contadorcitos = document.querySelectorAll('.count-cantidad')
    const rapidez = 1000
    let valor_actual;
    let incremento;
    let cambio;
    let cantidad_maxima;

    const verticalTop = () => {
        document.querySelectorAll(".VTop");
    }

    const horizontalLeft = () => {
        document.querySelectorAll(".HLeft");
    }

    const horizontalRight = () => {
        document.querySelectorAll(".HRight");
    }

    const verticalBottom = () => {
        document.querySelectorAll(".VBot");
    }

    const animarContadores = () => {
        for (const contadorsote of contadorcitos) {
            const actualizar_contador = () => {
                cantidad_maxima = parseInt(contadorsote.dataset.cantidadTotal);
                valor_actual = parseInt(contadorsote.innerText);
                cambio = cantidad_maxima / rapidez
                incremento = (rapidez / cantidad_maxima) * 10;
                if (valor_actual < cantidad_maxima) {
                    contadorsote.innerText = +Math.ceil(valor_actual + cambio);
                    setTimeout(actualizar_contador, incremento);
                }
                else if (valor_actual == cantidad_maxima) {
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
                elemento.target.classList.add('topY')
                elemento.target.classList.remove('hideee')
                setTimeout(animarContadores, 300)
            }
        });
    }

    const mostrarVerticalTop = elementos => {
        elementos.forEach(elemento => {
            if (elemento.isIntersecting) {
                elemento.target.classList.add('topY');
                elemento.target.classList.remove('hideee');
                setTimeout(verticalTop, 300)
            }
        });
    }

    const mostrarVerticalBottom = elementos => {
        elementos.forEach(elemento => {
            if (elemento.isIntersecting) {
                elemento.target.classList.add('botY');
                elemento.target.classList.remove('hideee');
                setTimeout(verticalBottom, 300)
            }
        });
    }

    const mostrarHorizontalLeft = elementos => {
        elementos.forEach(elemento => {
            if (elemento.isIntersecting) {
                elemento.target.classList.add('leftX');
                elemento.target.classList.remove('hideee');
                setTimeout(horizontalLeft, 300)
            }
        });
    }

    const mostrarHorizontalRight = elementos => {
        elementos.forEach(elemento => {
            if (elemento.isIntersecting) {
                elemento.target.classList.add('rightX');
                elemento.target.classList.remove('hideee');
                setTimeout(horizontalRight, 300)
            }
        });
    }

    /*INSTANCIAMOS LA CLASE*/

    const observer = new IntersectionObserver(mostrarContadores, {
        threshold: 0.75// 0 - 1
    })

    const observerVTop = new IntersectionObserver(mostrarVerticalTop, {
        threshold: 0.5
    })

    const observerVBot = new IntersectionObserver(mostrarVerticalBottom, {
        threshold: 0.75
    })

    const observerHLeft = new IntersectionObserver(mostrarHorizontalLeft, {
        threshold: 0.75
    })

    const observerHRight = new IntersectionObserver(mostrarHorizontalRight, {
        threshold: 0.75
    })

    /*OBSERVADOR*/

    const elementosHTML = document.querySelectorAll('.hijo-contador')
    elementosHTML.forEach(elementoHTML => {
        observer.observe(elementoHTML)
    })

    const elementosVTop = document.querySelectorAll('.VTop')
    elementosVTop.forEach(elementoHTML => {
        observerVTop.observe(elementoHTML)
    })

    const elementosVBot = document.querySelectorAll('.VBot')
    elementosVBot.forEach(elementoHTML => {
        observerVBot.observe(elementoHTML)
    })

    const elementosHRight = document.querySelectorAll('.HRight')
    elementosHRight.forEach(elementoHTML => {
        observerHRight.observe(elementoHTML)
    })

    const elementosHLeft = document.querySelectorAll('.HLeft')
    elementosHLeft.forEach(elementoHTML => {
        observerHLeft.observe(elementoHTML)
    })

})

/*CODIGO PARA EL CAMBIO DE ICONO (+) (-) CUANDO EL INPUT ESTÉ CHECKEADO*/


$(".card").on("click", ".icon-plus", function () {

    $(this).toggleClass("icon-minus");

    if ($(this).hasClass("icon-minus")) {
        $(this).parent().children(".card-down").css("visibility", "hidden");
        $(this).parent().children(".card-content").css("height", "100%");
    }
    else {
        $(".card-down").css("visibility", "visible");
        $(this).parent().children(".card-content").css("height", "180px");
    }
});






























































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































