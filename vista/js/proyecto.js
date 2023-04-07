/*=============================================
FILTRAR POR TIPO
=============================================*/

let contenedorItems = document.querySelectorAll(".content-proyecto");

contenedorItems.forEach((element) => {
	let botonProyecto = element.querySelectorAll(".btnFiltro");
	botonProyecto.forEach((boton) => {
		boton.addEventListener("click", async () => {
			let idFiltro = boton.getAttribute("idFiltro");
			let datos = new FormData();
			datos.append("idFiltro", idFiltro);
			try {
				const response = await fetch("ajax/proyectos.ajax.php", {
					method: "POST",
					body: datos,
				})
				if (response.ok) {
					const respuesta = await response.text();
					document.querySelector("#items").innerHTML = respuesta;
					Array.from(boton.parentElement.children).forEach((elemento) => {
						if (elemento.classList.contains("btnFiltro")) {
							elemento.classList.remove("active");
						}
						if (elemento.classList.contains("btnTodos")) {
							elemento.classList.remove("active");
						}
					})
					boton.classList.add("active");
				}
				else {
					throw new Error(`Error ${response.status}: ${response.statusText}`);
				}
			} catch (error) {
				console.log(error);
			}
		})
	})
})

contenedorItems.forEach((contenedor) => {
	let botonTodos = contenedor.querySelectorAll(".btnTodos");
	botonTodos.forEach((btnTodos) => {
		btnTodos.addEventListener("click", async () => {
			let idCategoria = btnTodos.getAttribute("idCategoria");
			let datos = new FormData();
			datos.append("idCategoria", idCategoria);

			try {
				const response = await fetch("ajax/proyectos.ajax.php", {
					method: "POST",
					body: datos,
				});

				if (response.ok) {
					const respuesta = await response.text();
					document.querySelector("#items").innerHTML = respuesta;

					Array.from(btnTodos.parentElement.children).forEach((elemento) => {
						if (elemento.classList.contains("btnFiltro")) {
							elemento.classList.remove("active");
						}
					})
					btnTodos.classList.add("active");
				} else {
					throw new Error(`Error ${response.status}: ${response.statusText}`);
				}
			} catch (error) {
				console.error(error);
			}
		});
	});
});

// 			function complete() {
// 				$("#items").html(respuesta);
// 			}
// 			$("#items").fadeOut(500, "linear", complete);
// 			$("#items").fadeIn(500, "linear", complete);

/*=========================================
				BUSCADOR
===========================================*/

document.addEventListener("keyup", (e) => {

	let nothingItem = document.querySelector(".nothingItem");
	let arregloProyecto = [];

	if (e.target.matches("#buscador")) {
		if (e.key === "Escape") {
			e.target.value = "";
		}
		document.querySelectorAll(".articulo").forEach(proyecto => {
			let proyectox = proyecto.parentElement.parentElement;
			if (proyecto.textContent.toLowerCase().includes(e.target.value.toLowerCase())) {
				proyectox.style.display = "flex";
			} else if (!proyecto.textContent.toLowerCase().includes(e.target.value.toLowerCase())) {
				proyectox.style.display = "none";
			}
			let iteradorProyecto = proyecto.parentElement.parentElement.style.display;
			arregloProyecto.push(iteradorProyecto);
		});

		if (arregloProyecto.every((item) => item == "none")) {
			nothingItem.style.display = "grid";
		}
		else if (arregloProyecto.some((item) => item == "flex")) {
			nothingItem.style.display = "none";
		}
	}

})




