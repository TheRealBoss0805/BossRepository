
const emailContainers = document.querySelectorAll('.emailsImportant .card');

const emailStates = {
    0: ["Área de Licitaciones", "comercial@indeconsult.pe", "mailto:comercial@indeconsult.pe"],
    1: ["Área de Ingeniería", "ingenieria@indeconsult.pe", "mailto:ingenieria@indeconsult.pe"],
    2: ["Área de Proyectos", "proyectos@indeconsult.pe", "mailto:proyectos@indeconsult.pe"],
    3: ["Área administrativas", "administración@indeconsult.pe", "mailto:administracion@indeconsult.pe"]
};

// Agregamos un evento 'click' a cada contenedor de correo

emailContainers.forEach((container, i) => {
    const enlaceEmail = container.querySelector('.a-email');
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
            enlaceEmail.setAttribute("href", emailStates[i][2]);

        } else {
            container.classList.remove("cardJs");
            container.querySelector(".overlay").classList.remove("overlayJs");
            container.querySelector(".circle-email").classList.remove("circleJs");
            container.querySelector(".fi").classList.remove("jsFi");
            emailParagraph.classList.remove("pJs");

            // Si es la inversa, lo cambiamos de vuelta al valor original

            enlaceEmail.removeAttribute("href");
            emailParagraph.textContent = emailStates[i][0];
        }
    });

});
