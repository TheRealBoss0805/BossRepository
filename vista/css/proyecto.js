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
	});
	$(this).parent().children(".btnFiltro").removeClass("active");
	$(this).parent().children(".btnTodos").removeClass("active");
	$(this).addClass("active");
})


/*=============================================
TRAER "TODOS" POR TIPO O POR SECTOR
=============================================*/
$(".content-proyecto").on("click", ".btnTodos", function(){
    
	var idCategoria = $(this).attr("idCategoria");
	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

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
	});
	$(this).parent().children(".btnFiltro").removeClass("active");
	$(this).removeClass("active");
	$(this).addClass("active");
})