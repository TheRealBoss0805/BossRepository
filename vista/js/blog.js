/*=============================================
FILTRAR POR CATEGORIA
=============================================*/
$(".blog-1").on("click", ".btnCategoria", function(){

	cajaIdCategoria = $(this).parent().parent().children("#idCategoria");
	cajaValorAnio = $(this).parent().parent().children("#valorAnio");

	cajaIdCategoria.val($(this).attr("idCategoria"));

	var idCategoria = $(this).parent().parent().children("#idCategoria").val();
	var valorAnio= $(this).parent().parent().children("#valorAnio").val();
	//console.log(idCategoria);
	var datos = new FormData();
	datos.append("idCategoria", idCategoria);
	datos.append("valorAnio", valorAnio);

	$.ajax({
		url: "ajax/blogPublicaciones.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	success: function(respuesta){
             $("#publicaciones").html(respuesta);
     	}
	});
	$(this).parent().children(".btnCategoria").removeClass("active");
	$(this).parent().children(".btnTodos").removeClass("active");
	$(this).addClass("active");
})


/*=============================================
TRAER "TODOS CATEGORIA"
=============================================*/
$(".blog-1").on("click", ".btnTodos", function(){

	cajaIdCategoria = $(this).parent().parent().children("#idCategoria");
	cajaValorAnio = $(this).parent().parent().children("#valorAnio");

	cajaIdCategoria.val("");
	cajaValorAnio.val("");

	var datos = new FormData();

	datos.append("idCategoria", cajaIdCategoria.val());
	datos.append("valorAnio", cajaValorAnio.val());

	$.ajax({
		url: "ajax/blogPublicaciones.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	success: function(respuesta){
             $("#publicaciones").html(respuesta);
     	}
	});

	$(this).parent().children(".btnCategoria").removeClass("active");
	$(this).parent().children(".btnTodos").removeClass("active");
	$(this).parent().parent().parent().parent().children(".content-blog-2").children(".blog-2").children("div").children(".btnAnio").removeClass("active");
	$(this).addClass("active");
})

/*=============================================
FILTRAR POR AÑO
=============================================*/
$(".blog-2").on("click", ".btnAnio", function(){
	console.log("Estoy en año");
	cajaIdCategoria = $(this).parent().parent().parent().parent().children(".content-blog-1").children(".blog-1").children("#idCategoria");
	cajaValorAnio =  $(this).parent().parent().parent().parent().children(".content-blog-1").children(".blog-1").children("#valorAnio");

	//cajaIdCategoria.val("");
	cajaValorAnio.val($(this).attr("anio"));

	var datos = new FormData();

	datos.append("idCategoria", cajaIdCategoria.val());
	datos.append("valorAnio", cajaValorAnio.val());

	$.ajax({
		url: "ajax/blogPublicaciones.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	success: function(respuesta){
             $("#publicaciones").html(respuesta);
     	}
	});

	$(this).parent().children(".btnAnio").removeClass("active");
	$(this).addClass("active");
})