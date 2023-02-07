<?php

require_once "../controlador/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";

class AjaxProyectos{

	/*=============================================
	EDITAR AREA
	=============================================*/	

	public $idFiltro;

	public function ajaxEditarArea(){

		$item = "id_proy_ts";
		$valor = $this->idFiltro;       
		$respuesta = ControladorProyecto::ctrMostrarItem($item, $valor);
        foreach($respuesta as $item){

        echo "<div class='parent-button-div'>
        <img src='vista/imagenes/extras/img-1.png' alt=''>
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
VALIDAR NO REPETIR AREA
=============================================*/

if(isset( $_POST["idFiltro"])){
	$valFiltro = new AjaxProyectos();
	$valFiltro -> idFiltro = $_POST["idFiltro"];
	$valFiltro -> ajaxEditarArea();
}