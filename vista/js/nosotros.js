
let urlcurrently = window.location.search;
let usInfo = document.querySelector("#usInfo");
let politicInfo = document.querySelector("#politicsInfo");
let titles = document.querySelector("#titles");
let descriptions = document.querySelector("#descriptions");
let imgWho = document.querySelector("#imgWho");
let imgUs = document.querySelector("#imgUs");

switch(urlcurrently){
    case '?ruta=nosotros&1':
        politicInfo.style.display= "none";
        titles.textContent = "¿Quienes Somos?"; 
        descriptions.textContent = "INSTITUTO DE CONSULTORÍA S.A. es una institución que desde su creación en 1995 viene contribuyendo al esfuerzo que los sectores público y privado realizan para el desarrollo de nuestro país.";
        /*descriptions.textContent= "BIENVENIDOS A INDECONSULT S.A. – INGENIEROS CONSULTORES.";*/
        imgWho.src = "vista/imagenes/nosotros/politicas.jpg";
        imgUs.src = "vista/imagenes/nosotros/politicas.png";
        imgUs.classList.add("png2");
    break;
    
    case '?ruta=nosotros&2':
        usInfo.style.display= "none"
        titles.textContent = "Políticas de Gestión de INDECONSULT S.A."
        descriptions.textContent = "INSTITUTO DE CONSULTORÍA S.A. en su decisión de brindar un servicio de excelencia a sus clientes y mejorar la calidad de vida de sus colaboradores y de la sociedad en general sigue las siguientes políticas:";
        /*descriptions.textContent = "COMPROMETIDOS CON LA SEGURIDAD, SALUD OCUPACIONAL, CALIDAD Y MEDIO AMBIENTE.";*/
        imgWho.src = "vista/imagenes/nosotros/somos.jpg";
        imgUs.src = "vista/imagenes/nosotros/somos.png";
        imgUs.classList.add("png1");
    break;
}

/*vista/imagenes/nosotros/politicas.jpg
vista/imagenes/nosotros/somos.jpg
*/