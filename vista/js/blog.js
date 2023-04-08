

function prevPage() {
	let input_current_page = document.querySelector("#input_page");
	let current_page = input_current_page.value;
	let input_total_pages = document.querySelector("#input_total_pages");

	if (current_page > 1) {
		current_page--;
		input_current_page.value = current_page;
		cajaIdCategoria = document.querySelector("#idCategoria");
		cajaValorAnio = document.querySelector("#valorAnio");
		traerAjax(current_page, cajaIdCategoria, cajaValorAnio);
	}
}

//AVANZAR EN PAGINACION

function nextPage() {
	let input_current_page = document.querySelector("#input_page");
	let current_page = input_current_page.value;
	let input_total_pages = document.querySelector("#input_total_pages");
	let total_pages = input_total_pages.value;
	if (current_page < total_pages) {
		current_page++;
		input_current_page.value = current_page;
		cajaIdCategoria = document.querySelector("#idCategoria");
		cajaValorAnio = document.querySelector("#valorAnio");
		traerAjax(current_page, cajaIdCategoria, cajaValorAnio);
	}
}
//ACTUALIZA LA POSICION DE LA PAGINA Y EL NUMERO TOTAL DEL MISMO  EJM 3/4

function actualizarNroPagina() {
	document.querySelector("#total_pages").innerHTML = document.querySelector("#input_total_pages").value;
	document.querySelector("#page").innerHTML = (document.querySelector("#input_total_pages").value == 0) ? "0" : document.querySelector("#input_page").value;
}

//FUNCIONES AJAX 

async function traerAjax(current_page, cajaIdCategoria, cajaValorAnio) {
	let datos = new FormData();
	datos.append("idCategoria", cajaIdCategoria.value);
	datos.append("valorAnio", cajaValorAnio.value);
	datos.append("pagina", current_page);

	try {
		const response = await fetch("ajax/blogPublicaciones.ajax.php", {
			method: "POST",
			body: datos,
		})
		if (response.ok) {
			const respuesta = await response.text();
			document.querySelector("#publicaciones").innerHTML = respuesta;
			actualizarNroPagina()
		}
		else {
			throw new Error(`Error ${response.status}: ${response.statusText}`);
		}
	} catch (error) {
		console.log(error);
	}
}

function traerCategoriaAjax(btn) {

	let cajaIdCategoria
	let cajaValorAnio

	Array.from(btn.parentElement.parentElement.children).forEach((elemento) => {
		if (elemento.getAttribute("id") == "idCategoria") {
			cajaIdCategoria = elemento;
			cajaIdCategoria.value = btn.getAttribute("idCategoria")
		}
	})
	Array.from(btn.parentElement.parentElement.children).forEach((elemento) => {
		if (elemento.getAttribute("id") == "valorAnio") {
			cajaValorAnio = elemento;
		}
	})

	traerAjax(1, cajaIdCategoria, cajaValorAnio);

	Array.from(btn.parentElement.children).forEach((elemento) => {
		if (elemento.classList.contains("btnCategoria")) {
			elemento.classList.remove("active");
		}
	})
	Array.from(btn.parentElement.children).forEach((elemento) => {
		if (elemento.classList.contains("btnTodos")) {
			elemento.classList.remove("active");
		}
	})
	btn.classList.add("active");
}

function traerTodosAjax(btn) {

	let cajaIdCategoria;
	let cajaValorAnio;

	Array.from(btn.parentElement.parentElement.children).forEach((elemento) => {
		if (elemento.getAttribute("id") == "idCategoria") {
			cajaIdCategoria = elemento;
			cajaIdCategoria.value = "";
		}
	})
	Array.from(btn.parentElement.parentElement.children).forEach((elemento) => {
		if (elemento.getAttribute("id") == "valorAnio") {
			cajaValorAnio = elemento;
			cajaValorAnio.value = "";
		}
	})

	traerAjax(1, cajaIdCategoria, cajaValorAnio);

	Array.from(btn.parentElement.children).forEach((elemento) => {
		if (elemento.classList.contains("btnCategoria")) {
			elemento.classList.remove("active");
		}
	})
	Array.from(btn.parentElement.children).forEach((elemento) => {
		if (elemento.classList.contains("btnTodos")) {
			elemento.classList.remove("active");
		}
	})

	Array.from(btn.parentElement.parentElement.parentElement.parentElement.children).forEach((elemento) => {
		if (elemento.classList.contains("content-blog-2")) {
			Array.from(elemento.children).forEach((elemento) => {
				if (elemento.classList.contains("blog-2")) {
					Array.from(elemento.children).forEach((elemento) => {
						if (elemento.tagName === "DIV") {
							Array.from(elemento.children).forEach((elemento) => {
								if (elemento.classList.contains("btnAnio")) {
									elemento.classList.remove("active");
								}
							})
						}
					})
				}
			})
		}
	})

	btn.classList.add("active");
}

function traerAnioAjax(btn) {

	let cajaIdCategoria;
	let cajaValorAnio;

	Array.from(btn.parentElement.parentElement.parentElement.parentElement.children).forEach((elemento) => {
		if (elemento.classList.contains("content-blog-1")) {
			Array.from(elemento.children).forEach((elemento) => {
				if (elemento.classList.contains("blog-1")) {
					Array.from(elemento.children).forEach((elemento) => {
						if (elemento.getAttribute("id") == "idCategoria") {
							cajaIdCategoria = elemento;
						}
					})
				}
			})
		}
	})
	Array.from(btn.parentElement.parentElement.parentElement.parentElement.children).forEach((elemento) => {
		if (elemento.classList.contains("content-blog-1")) {
			Array.from(elemento.children).forEach((elemento) => {
				if (elemento.classList.contains("blog-1")) {
					Array.from(elemento.children).forEach((elemento) => {
						if (elemento.getAttribute("id") == "valorAnio") {
							cajaValorAnio = elemento;
							cajaValorAnio.value = btn.getAttribute("anio");
						}
					})
				}
			})
		}
	})

	traerAjax(1, cajaIdCategoria, cajaValorAnio);

	Array.from(btn.parentElement.children).forEach((elemento) => {
		if (elemento.classList.contains("btnAnio")) {
			elemento.classList.remove("active");
		}
	})

	btn.classList.add("active");
}

/*=============================================
FILTRAR POR CATEGORIA
=============================================*/

document.querySelectorAll(".blog-1").forEach((elemento) => {
	let btnCategoria = elemento.querySelectorAll(".btnCategoria");
	btnCategoria.forEach((element) => {
		element.addEventListener("click", () => {
			traerCategoriaAjax(element);
		})
	})
})


/*=============================================
TRAER "TODOS CATEGORIA"
=============================================*/

document.querySelectorAll(".blog-1").forEach((elemento) => {
	let btnTodos = elemento.querySelectorAll(".btnTodos");
	btnTodos.forEach((element) => {
		element.addEventListener("click", () => {
			traerTodosAjax(element);
		})
	})
})


/*=============================================
FILTRAR POR AÑO
=============================================*/

document.querySelectorAll(".blog-2").forEach((elemento) => {
	let btnAnio = elemento.querySelectorAll(".btnAnio");
	btnAnio.forEach((element) => {
		element.addEventListener("click", () => {
			traerAnioAjax(element);
		})
	})
})









