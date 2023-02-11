
/*let minimizar = document.getElementById("minimizar");

const operacion = () =>{
    let cosoAbrir = document.getElementById("ventanaChat");
    cosoAbrir.style.display = "none";

}

minimizar.addEventListener("click", operacion);*/

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
        /*cosoAbrir.style.display = "flex";*/
        intervalo = setInterval(function(){
            if (incremento){
                valor = 1;
            }
            else {
                valor++;
            }        
            //dividir por 100 para tener los valores del opacity
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



/*        Clikea en el cuadro para ver el resultado.
    <div id="principal">
	function detener(){
	clearInterval(intervalo);
	//restablecemos valores
	valor = 100;
	decremento = true;
}
	</div>*/





/*
var div = document.getElementById("principal");
var valor = 100;
var intervalo;
var decremento = true;*/

/*establecemos valores al div
div.style.width = "120px";
div.style.height = "120px";
div.style.background = "blue";
	
function detener(){
	clearInterval(intervalo);
	//restablecemos valores
	valor = 100;
	decremento = true;
}*/
/*
div.addEventListener("click", function(){
	intervalo = setInterval(function(){
		if (decremento){
			valor--;
		}
		else {
			valor++;
		}
					
		//al dividir por 100 obtenemos los decimales que toma la funcion opacity
		div.style.opacity = valor / 100;
		
		if (valor == 50) {
			if (div.style.background == "blue"){
				div.style.background = "red";
			}
			else{
				div.style.background = "blue";
			}
			decremento = false;
		}
		
		else if (valor == 100 && !decremento){
			detener()
		}
		
	}, 30); 
		
});*/