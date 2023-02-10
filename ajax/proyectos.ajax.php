<?php

require_once "../controlador/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";

class AjaxProyectos{

	/*=============================================
	TRAE LOS ITEMS DE ACUERDO A LOS FILTROS QUE SE APLIQUEN, YA SEA POR SECTOR O TIPO
	=============================================*/	

	public $idFiltro;
    public $idCategoria;

	public function ajaxFiltrar(){

		$item = "id_proy_ts";
		$valor = $this->idFiltro;       
		$respuesta = ControladorProyecto::ctrMostrarItem($item, $valor);
        foreach($respuesta as $item){

        echo "<div class='parent-button-div'>
        <img src='".$item["foto"]."' alt=''>
        <div class='button-div'>
            <a class='c-button c-button--gooey' href='index.php?ruta=proyecto-eleccion&id=".$item["id_proyec_item"]."'> Más info.
                <div class='c-button__blobs'>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </a>
            <svg style='display: block; height: 0; width: 0;' version='1.1' xmlns='http://www.w3.org/2000/svg'>
                <defs>
                    <filter id='goo'>
                        <feGaussianBlur result='blur' stdDeviation='10' in='SourceGraphic'></feGaussianBlur>
                        <feColorMatrix result='goo' values='1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7'
                            mode='matrix' in='blur'></feColorMatrix>
                        <feBlend in2='goo' in='SourceGraphic'></feBlend>
                    </filter>
                </defs>
            </svg>
            <p>
                ".$item["titulo"]."
            </p>
        </div>
    </div>";
    
}
	}
    
	public function ajaxTodos(){

		$item = "id_proyecto";
		$valor = $this->idCategoria;       
		$respuesta = ControladorProyecto::ctrMostrarItem($item, $valor);
        foreach($respuesta as $item){

        echo "<div class='parent-button-div'>
        <img src='".$item["foto"]."' alt=''>
        <div class='button-div'>
            <a class='c-button c-button--gooey' href='index.php?ruta=proyecto-eleccion&id=".$item["id_proyec_item"]."'> Más info.
                <div class='c-button__blobs'>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </a>
            <svg style='display: block; height: 0; width: 0;' version='1.1' xmlns='http://www.w3.org/2000/svg'>
                <defs>
                    <filter id='goo'>
                        <feGaussianBlur result='blur' stdDeviation='10' in='SourceGraphic'></feGaussianBlur>
                        <feColorMatrix result='goo' values='1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7'
                            mode='matrix' in='blur'></feColorMatrix>
                        <feBlend in2='goo' in='SourceGraphic'></feBlend>
                    </filter>
                </defs>
            </svg>
            <p>
                ".$item["titulo"]."
            </p>
        </div>
    </div>";
}
	}
	

	
}



/*=============================================
TRAE LOS ITEMS DE ACUERDO A LOS FILTROS QUE SE APLIQUEN, YA SEA POR SECTOR O TIPO
=============================================*/

if(isset( $_POST["idFiltro"])){
	$valFiltro = new AjaxProyectos();
	$valFiltro -> idFiltro = $_POST["idFiltro"];
	$valFiltro -> ajaxFiltrar();
}
/*=============================================
MUESTRA TODOS LOS ITEMS YA SAE POR SECTOR O POR TIPO
=============================================*/

if(isset( $_POST["idCategoria"])){
	$todos = new AjaxProyectos();
	$todos -> idCategoria = $_POST["idCategoria"];
	$todos -> ajaxTodos();
}