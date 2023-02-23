/*============SCROLL HACIA ARRIBA=================*/

let b = document.querySelector("#totop");

const botonTop = (a) => {
    b.classList.remove("off", "on");
    a == "on" ? b.classList.add("on") : b.classList.add("off");
}

window.setInterval(function () {
    let b = $(this).scrollTop();
    let c = $(this).height();
    if (b > 0) {
        var d = b + c / 2;
    } else {
        var d = 1;
    }

    if (d < 2e3) {
        botonTop("off");
    } else {
        botonTop("on");
    }

}, 0);

const funcionAnimar = (e) => {
    e.preventDefault();
    $('html').animate({ scrollTop: 0 }, 1500);
}

b.addEventListener("click", funcionAnimar);
