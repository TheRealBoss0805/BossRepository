
// Obtenemos los contenedores de correo del HTML
const emailContainers = document.querySelectorAll('.emailsImportant .card');

// Creamos un objeto con los valores originales e inversos de cada correo
const emailStates = {
    0: ["Área de Proyectos", "comercial@indeconsult.pe"],
    1: ["Área de Licitaciones", "ingenieria@indeconsult.pe"],
    2: ["Área de Ingeniería", "proyectos@indeconsult.pe"],
    3: ["Área administrativas", "administración@indeconsult.pe"]
};

// Agregamos un evento 'click' a cada contenedor de correo

emailContainers.forEach((container, i) => {

    const emailParagraph = container.querySelector('.change-email');

    // Establecemos el valor original del correo
    emailParagraph.textContent = emailStates[i][0];

    container.querySelector('.circle-email').addEventListener('click', () => {
        // Obtenemos el estado actual del correo
        const currentState = emailParagraph.textContent;

        // Verificamos si el estado actual es el valor original o la inversa
        if (currentState === emailStates[i][0]) {
            container.classList.add("cardJs");
            container.querySelector(".overlay").classList.add("overlayJs");
            container.querySelector(".circle-email").classList.add("circleJs");
            container.querySelector(".fi").classList.add("jsFi");
            emailParagraph.classList.add("pJs");
            // Si es el valor original, lo cambiamos al valor inverso
            emailParagraph.textContent = emailStates[i][1];
            
        } else {
            container.classList.remove("cardJs");
            container.querySelector(".overlay").classList.remove("overlayJs");
            container.querySelector(".circle-email").classList.remove("circleJs");
            container.querySelector(".fi").classList.remove("jsFi");
            emailParagraph.classList.remove("pJs");
            // Si es la inversa, lo cambiamos de vuelta al valor original
            emailParagraph.textContent = emailStates[i][0];
        }
    });

});
