
let urlcurrently = window.location.search;
let usInfo = document.querySelector("#usInfo");
let politicInfo = document.querySelector("#politicsInfo");
let titles = document.querySelector("#titles");
let descriptions = document.querySelector("#descriptions");
let imgWho = document.querySelector("#imgWho");

switch(urlcurrently){
    case '?ruta=nosotros&1':
        politicInfo.style.display= "none";
        titles.textContent = "¿Quienes Somos?"
        descriptions.textContent= "BIENVENIDOS A INDECONSULT S.A. – INGENIEROS CONSULTORES.";
        imgWho.src = "vista/imagenes/nosotros/politicas.jpg";
    break;
    
    case '?ruta=nosotros&2':
        usInfo.style.display= "none"
        titles.textContent = "Políticas de Gestión de INDECONSULT S.A."
        descriptions.textContent = "COMPROMETIDOS CON LA SEGURIDAD, SALUD OCUPACIONAL, CALIDAD Y MEDIO AMBIENTE.";
        imgWho.src = "vista/imagenes/nosotros/somos.jpg";
    break;
}

/*vista/imagenes/nosotros/politicas.jpg
vista/imagenes/nosotros/somos.jpg
*/