
let ovservadorElementos = addEventListener('DOMContentLoaded', () => {
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
                    contadorsote.innerText++;
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
        threshold: 0.2
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

module.exports = {ovservadorElementos};
