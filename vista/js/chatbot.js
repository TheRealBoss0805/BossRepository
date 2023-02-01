let minimi = document.getElementById("minimizar");
let cerrar = document.getElementById("cancelar");
let chatbot = document.getElementById("ventanaChat");
let prueba = document.getElementById("bossito")

const accion = () =>{

    chatbot.style.visibility = "hidden";
}

minimi.addEventListener("click", accion);