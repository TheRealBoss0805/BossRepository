
/*let ubicacionServicio = document.querySelector("#ubicacionServicio");
let estadoServicio = document.querySelector("#estadoServicio");
let botonServicio = document.querySelector("#botonServicio");




const eventoUbicacion = () => {
    let mostrarUbicacion = ubicacionServicio.value;
    console.log(mostrarUbicacion);
    return mostrarUbicacion;
}

const eventoEstado = () => {
    let mostrarEstado = estadoServicio.value;
    console.log(mostrarEstado);
    return mostrarEstado
}

ubicacionServicio.addEventListener("change", eventoUbicacion); 
estadoServicio.addEventListener("change", eventoEstado);*/

/*
document.addEventListener("change", e => {
    if(e.target.matches("#ubicacionServicio")){
        document.querySelectorAll(".item").forEach(servicio => {
            let serviciox = servicio.parentElement;
            if(servicio.getAttribute("valor").toLowerCase().includes(e.target.value.toLowerCase())){
                serviciox.style.display = "flex";
            }
            else{
                serviciox.style.display = "none";
            }
        });
    }
})*/

document.addEventListener("change", e => {
    if(e.target.matches("#ubicacionServicio")){
        document.querySelectorAll(".item").forEach(servicio => {
            let serviciox = servicio.parentElement;
            if(servicio.getAttribute("valor").toLowerCase().includes(e.target.value.toLowerCase())){
                serviciox.style.display = "flex";
            }
            else{
                serviciox.style.display = "none";
            }
        });
    }
})



