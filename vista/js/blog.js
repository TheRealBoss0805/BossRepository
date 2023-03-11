

function prevPage() {
	let input_current_page = $("#input_page");
	let current_page = input_current_page.val();
	let input_total_pages = $("#input_total_pages");

	if (current_page > 1) {
		current_page--;
		input_current_page.val(current_page);
		cajaIdCategoria = $("#idCategoria");
		cajaValorAnio = $("#valorAnio");
		traerAjax(current_page);
	}
}

//AVANZAR EN PAGINACION

function nextPage() {
	let input_current_page = $("#input_page");
	let current_page = input_current_page.val();
	let input_total_pages = $("#input_total_pages");
	let total_pages = input_total_pages.val();
	if (current_page < total_pages) {
		current_page++;
		input_current_page.val(current_page);
		cajaIdCategoria = $("#idCategoria");
		cajaValorAnio = $("#valorAnio");
		traerAjax(current_page);
	}
}
//ACTUALIZA LA POSICION DE LA PAGINA Y EL NUMERO TOTAL DEL MISMO  EJM 3/4

function actualizarNroPagina() {
	$("#total_pages").html($("#input_total_pages").val())
	$("#page").html(($("#input_total_pages").val() == 0) ? '0' : $("#input_page").val());
}

//FUNCIONES AJAX 

function traerAjax(current_page) {
	var datos = new FormData();

	datos.append("idCategoria", cajaIdCategoria.val());
	datos.append("valorAnio", cajaValorAnio.val());
	datos.append("pagina", current_page);

	$.ajax({
		url: "ajax/blogPublicaciones.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {
			/*function complete() {
				$("#publicaciones").html(respuesta);
			}
			$("#publicaciones").fadeOut(500, "linear", complete);
			$("#publicaciones").fadeIn(500, "linear", complete);*/
			$("#publicaciones").html(respuesta);
			actualizarNroPagina()
		}
	});
}
function traerCategoriaAjax(btn) {

	cajaIdCategoria = $(btn).parent().parent().children("#idCategoria");
	cajaValorAnio = $(btn).parent().parent().children("#valorAnio");
	cajaIdCategoria.val($(btn).attr("idCategoria"));
	traerAjax(1);
	$(btn).parent().children(".btnCategoria").removeClass("active");
	$(btn).parent().children(".btnTodos").removeClass("active");
	$(btn).addClass("active");

}

function traerTodosAjax(btn) {

	cajaIdCategoria = $(btn).parent().parent().children("#idCategoria");
	cajaValorAnio = $(btn).parent().parent().children("#valorAnio");
	cajaIdCategoria.val("");
	cajaValorAnio.val("");
	traerAjax(1);
	$(btn).parent().children(".btnCategoria").removeClass("active");
	$(btn).parent().children(".btnTodos").removeClass("active");
	$(btn).parent().parent().parent().parent().children(".content-blog-2").children(".blog-2").children("div").children(".btnAnio").removeClass("active");
	$(btn).addClass("active");
}

function traerAnioAjax(btn) {

	cajaIdCategoria = $(btn).parent().parent().parent().parent().children(".content-blog-1").children(".blog-1").children("#idCategoria");
	cajaValorAnio = $(btn).parent().parent().parent().parent().children(".content-blog-1").children(".blog-1").children("#valorAnio");
	cajaValorAnio.val($(btn).attr("anio"));
	traerAjax(1);
	$(btn).parent().children(".btnAnio").removeClass("active");
	$(btn).addClass("active");

}

/*=============================================
FILTRAR POR CATEGORIA
=============================================*/
$(".blog-1").on("click", ".btnCategoria", function () {
	traerCategoriaAjax(this);
})


/*=============================================
TRAER "TODOS CATEGORIA"
=============================================*/
$(".blog-1").on("click", ".btnTodos", function () {
	traerTodosAjax(this);
})


/*=============================================
FILTRAR POR AÑO
=============================================*/
$(".blog-2").on("click", ".btnAnio", function () {
	traerAnioAjax(this);
})

/*========================BUSCADOR DEL BLOG================================
document.addEventListener("keyup", async (e) => {
	if (e.target.matches("#buscadorB")) {
		if (e.key === "Escape") {
			e.target.value = "";
		}
		document.querySelectorAll(".articuloB").forEach(blog => {
			let blogx = blog.parentElement.parentElement;
			if (blog.textContent.toLowerCase().includes(e.target.value.toLowerCase())) {
				blogx.style.display = "flex";
			} else {
				blogx.style.display = "none";
			}
		});
	}
})*/








