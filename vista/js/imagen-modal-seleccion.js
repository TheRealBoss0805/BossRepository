
document.addEventListener("DOMContentLoaded", () => {

    let modal = document.querySelector("#myModal");
    let img = document.querySelector("#myImg");
    let modalImagen = document.querySelector("#img01");
    let opcionTexto = document.querySelector("#caption");
    let span = document.querySelector(".close");

    img.addEventListener("click", (event) => {
        modalImagen.src = event.target.src;
        modalImagen.alt = event.target.alt;
        opcionTexto.innerHTML = event.target.alt;
        modal.classList.add("aparecerModal");
    })

    span.addEventListener("click", () => {
        modal.classList.remove("aparecerModal");
    })
})