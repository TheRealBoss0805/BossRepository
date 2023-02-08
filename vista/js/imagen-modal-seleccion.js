// Get the modal
let modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
let img = document.getElementById("myImg");
let modalImagen = document.getElementById("img01");
let opcionTexto = document.getElementById("caption");

const aparecerModal = function () {
    modal.style.visibility = "visible";
    modalImagen.src = this.src;
    modalImagen.alt = this.alt;
    opcionTexto.innerHTML = this.alt;
}

img.addEventListener("click", aparecerModal);

// Get the <span> element that closes the modal
let span = document.querySelector(".close");

console.log(span);

// When the user clicks on <span> (x), close the modal

const desaparecerModal = function () {
    modal.style.visibility = "hidden";
}

span.addEventListener("click", desaparecerModal);


