// let idBlog = document.querySelectorAll("#idBlog");
// let current_page = 1;
// let obj_per_page = 2;

// function totNumPages() {
// 	return Math.ceil(idBlog.length / obj_per_page);
// }
// let input_current_page = $("#input_page");
// let current_page = input_current_page.val();
// let input_total_pages = $("#input_total_pages");
// let total_pages = input_total_pages.val();
// RETROCEDER EN PAGINACION
function prevPage() {
	let input_current_page = $("#input_page");
	let current_page = input_current_page.val();
	let input_total_pages = $("#input_total_pages");
	//let total_pages = input_total_pages.val();

	if (current_page> 1) {
		current_page--;
		input_current_page.val(current_page);
		cajaIdCategoria = $("#idCategoria");
		cajaValorAnio = $("#valorAnio");
		traerAjax(current_page);
		//console.log(total_pages);
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
		//console.log("pagina actual:"+current_page);
		cajaIdCategoria = $("#idCategoria");
		cajaValorAnio = $("#valorAnio");
		traerAjax(current_page);
		//console.log(total_pages);
		// var idCategoria = $(btn).parent().parent().children("#idCategoria").val();
		// var valorAnio = $(btn).parent().parent().children("#valorAnio").val();
		
	}
}
//ACTUALIZA LA POSICION DE LA PAGINA Y EL NUMERO TOTAL DEL MISMO  EJM 3/4
function actualizarNroPagina(){
	$("#total_pages").html($("#input_total_pages").val())
	$("#page").html(($("#input_total_pages").val()==0)?'0':$("#input_page").val());
}

// function change(page) {

// 	let btn_prev = document.getElementById("btnBefore");
// 	let btn_next = document.getElementById("btnAfter");
// 	let listing_table = document.getElementById("publicaciones");
// 	/*var page_span = document.getElementById("page");*/
// 	if (page < 1) page = 1;
// 	if (page > totNumPages()) page = totNumPages();
// 	listing_table.innerHTML = "";

// 	for (var i = (page - 1) * obj_per_page; i < (page * obj_per_page) && i < idBlog.length; i++) {
// 		listing_table.appendChild(idBlog[i]);
// 	}
// 	/*page_span.innerHTML = page;*/
// 	if (page == 1) {
// 		btn_prev.disabled = true;
// 		btn_prev.style.opacity = "0.5";
// 	} else {
// 		btn_prev.disabled = false;
// 		btn_prev.style.opacity = "1";
// 	}
// 	if (page == totNumPages()) {
// 		btn_next.disabled = true;
// 		btn_next.style.opacity = "0.5";
// 	} else {
// 		btn_next.disabled = false;
// 		btn_next.style.opacity = "1";
// 	}
// }

// window.onload = function () {
// 	change(1);
// };
//FUNCIONES AJAX 
function traerAjax(current_page){
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
			$("#publicaciones").html(respuesta);
			actualizarNroPagina()
			//console.log(respuesta);
			
		}
	});
}
function traerCategoriaAjax(btn){
	//console.log("categoria");
	cajaIdCategoria = $(btn).parent().parent().children("#idCategoria");
	cajaValorAnio = $(btn).parent().parent().children("#valorAnio");

	cajaIdCategoria.val($(btn).attr("idCategoria"));

	// var idCategoria = $(btn).parent().parent().children("#idCategoria").val();
	// var valorAnio = $(btn).parent().parent().children("#valorAnio").val();
	traerAjax(1);
	$(btn).parent().children(".btnCategoria").removeClass("active");
	$(btn).parent().children(".btnTodos").removeClass("active");
	$(btn).addClass("active");

}

function traerTodosAjax(btn){
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

function traerAnioAjax(btn){
	cajaIdCategoria = $(btn).parent().parent().parent().parent().children(".content-blog-1").children(".blog-1").children("#idCategoria");
	cajaValorAnio = $(btn).parent().parent().parent().parent().children(".content-blog-1").children(".blog-1").children("#valorAnio");

	//cajaIdCategoria.val("");
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


/*========================BUSCADOR DEL BLOG================================*/
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
})

/*===============PAGINADO - INTENTO CUCHUMIL================== */








