
let minimizar = document.querySelector("#bossito");
var valor;
var intervalo;
var incremento = true;


function detener(){
	clearInterval(intervalo);
	//restablecemos valores
	valor;
	incremento = true;
}

const operacion = () =>{
    let cosoAbrir = document.querySelector("#ventanaChat");
        intervalo = setInterval(function(){
            if (incremento){
                valor = 1;
            }
            else {
                valor++;
            }        
            cosoAbrir.style.opacity = valor / 100;
            
            if (valor == 1) {
                cosoAbrir.style.display = "flex";
                incremento = false;
            }
            else if (valor == 100 && !incremento){
                detener()
            } 
        }, 0);  
}

minimizar.addEventListener("click", operacion);



let minimizar2 = document.querySelector("#bossito2");

const operacion2 = () =>{
    let cosoAbrir = document.querySelector("#ventanaChat");
        cosoAbrir.style.display = "none";
}

minimizar2.addEventListener("click", operacion2);

let minimizar3 = document.querySelector("#bossito3");

const operacion3 = () =>{
    let cosoAbrir = document.querySelector("#ventanaChat");
        cosoAbrir.style.display = "none";
}

minimizar3.addEventListener("click", operacion3);


