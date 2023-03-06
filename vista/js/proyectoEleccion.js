
function galeriaItem() {
    $(".itemGalery").removeClass("activate");
    $(".itemGalery:eq(0)").addClass("activate");
    $(".tagItem:eq(0)").attr("src", "vista/imagenes/proyectsandservices/proyectos/ejemploGaleriaProyecto/etiquetaabierta.png");
    $(".pItem").css("color","#123d58");    
    $(".fi").css("color","#123d58");
    $(".pItem:eq(0)").css("color","#951d1d");    
    $(".fi:eq(0)").css("color","#951d1d");

    $(".contentItemGalery").on("click", ".electionItem", function () {

        /*ELIMINO LA CLASE DEL ELEMENTO PREVIO*/

        if ($(".itemGalery").hasClass("activate")) {
            $(".itemGalery").removeClass("activate");
            $(".tagItem").attr("src", "vista/imagenes/proyectsandservices/proyectos/ejemploGaleriaProyecto/etiquetacerrada.png");
            $(".pItem").css("color","#123d58");    
            $(".fi").css("color","#123d58");
        }

        /*AÑADO LA CLASE EN EL ELEMENTO ACTUAL*/

        if ($(this).attr("valor")) {
            let selected = $(this).attr("valor") - 1;
            $(".itemGalery:eq(" + selected + ")").addClass("activate");
            $(this).children(".tagItem").attr("src", "vista/imagenes/proyectsandservices/proyectos/ejemploGaleriaProyecto/etiquetaabierta.png");
            $(this).children(".pItem").css("color","#951d1d");
            $(this).children(".fi").css("color","#951d1d");
        }

    });
}

//EJECUTO LA FUNCIÓN

galeriaItem();

