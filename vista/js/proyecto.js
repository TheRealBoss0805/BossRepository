/*=============================================
FILTRAR POR TIPO
=============================================*/
$(".content-proyecto").on("click", ".btnFiltro", function(){
    
	var idFiltro = $(this).attr("idFiltro");
	var datos = new FormData();
	datos.append("idFiltro", idFiltro);

	$.ajax({
		url: "ajax/proyectos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	success: function(respuesta){
             $("#items").html(respuesta);
     	}
	})
})