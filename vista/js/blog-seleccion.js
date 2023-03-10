
document.addEventListener("DOMContentLoaded", () => {
    let contentBlog = document.querySelector(".cambioContent");
    let cambioCaracter = document.querySelector(".cambioCaracter");
    let elementoP = document.querySelector(".descriptionBlogSelection");
    let texto = elementoP.textContent;
    let cantidadCaracteres = texto.length;

    console.log(cantidadCaracteres);
    if (cantidadCaracteres > 470) {
        cambioCaracter.classList.add("cambioCaracter");
        contentBlog.classList.add("cambioContent");
    }
    else {
        cambioCaracter.classList.remove("cambioCaracter");
        contentBlog.classList.remove("cambioContent");
    }
})