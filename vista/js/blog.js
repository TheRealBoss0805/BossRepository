let idBlog = document.querySelectorAll("#idBlog");
let current_page = 1;
let obj_per_page = 2;

function totNumPages() {
	return Math.ceil(idBlog.length / obj_per_page);
}

function prevPage() {
	if (current_page > 1) {
		current_page--;
		change(current_page);
	}
}

function nextPage() {
	if (current_page < totNumPages()) {
		current_page++;
		change(current_page);
	}
}

function change(page) {

	let btn_prev = document.getElementById("btnBefore");
	let btn_next = document.getElementById("btnAfter");
	let listing_table = document.getElementById("publicaciones");
	/*var page_span = document.getElementById("page");*/
	if (page < 1) page = 1;
	if (page > totNumPages()) page = totNumPages();
	listing_table.innerHTML = "";

	for (var i = (page - 1) * obj_per_page; i < (page * obj_per_page) && i < idBlog.length; i++) {
		listing_table.appendChild(idBlog[i]);
	}
	/*page_span.innerHTML = page;*/
	if (page == 1) {
		btn_prev.disabled = true;
		btn_prev.style.opacity = "0.5";
	} else {
		btn_prev.disabled = false;
		btn_prev.style.opacity = "1";
	}
	if (page == totNumPages()) {
		btn_next.disabled = true;
		btn_next.style.opacity = "0.5";
	} else {
		btn_next.disabled = false;
		btn_next.style.opacity = "1";
	}
}

window.onload = function () {
	change(1);
};


/*=============================================
FILTRAR POR CATEGORIA
=============================================*/
$(".blog-1").on("click", ".btnCategoria", function () {


	cajaIdCategoria = $(this).parent().parent().children("#idCategoria");
	cajaValorAnio = $(this).parent().parent().children("#valorAnio");

	cajaIdCategoria.val($(this).attr("idCategoria"));

	var idCategoria = $(this).parent().parent().children("#idCategoria").val();
	var valorAnio = $(this).parent().parent().children("#valorAnio").val();
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
		success: function (respuesta) {
			$("#publicaciones").html(respuesta);
			console.log(respuesta);
		}
	});
	$(this).parent().children(".btnCategoria").removeClass("active");
	$(this).parent().children(".btnTodos").removeClass("active");
	$(this).addClass("active");
})


/*=============================================
TRAER "TODOS CATEGORIA"
=============================================*/
$(".blog-1").on("click", ".btnTodos", function () {

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
		success: function (respuesta) {
			$("#publicaciones").html(respuesta);
			console.log(respuesta);
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
$(".blog-2").on("click", ".btnAnio", function () {

	cajaIdCategoria = $(this).parent().parent().parent().parent().children(".content-blog-1").children(".blog-1").children("#idCategoria");
	cajaValorAnio = $(this).parent().parent().parent().parent().children(".content-blog-1").children(".blog-1").children("#valorAnio");

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
		success: function (respuesta) {
			$("#publicaciones").html(respuesta);
			console.log(respuesta);
		}
	});

	$(this).parent().children(".btnAnio").removeClass("active");
	$(this).addClass("active");
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








