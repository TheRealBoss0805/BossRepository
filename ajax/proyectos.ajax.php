<?php

require_once "../controlador/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";

class AjaxProyectos
{

    /*=============================================
	TRAE LOS ITEMS DE ACUERDO A LOS FILTROS QUE SE APLIQUEN, YA SEA POR SECTOR O TIPO
	=============================================*/

    public $idFiltro;
    public $idCategoria;

    public function ajaxFiltrar()
    {

        $item = "id_proy_ts";
        $valor = $this->idFiltro;
        $respuesta = ControladorProyecto::ctrMostrarItem($item, $valor);
        foreach ($respuesta as $item) {
            echo "<div class='parent-button-div' id='" . $this->idFiltro . "'>
            <img src=" . $item["foto"] . " alt=''>
            <div class='button-div'>
                <a class='c-button c-button--gooey' href='index.php?ruta=proyecto-eleccion&id=" . $item["id_proyec_item"] . "'> Más info.
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
            </div>
            <div class='buttons-div-2'>
                <p class='articulo'>" . $item["titulo"] . "</p>
            </div>     
        </div>";
        }
        echo "<p class='nothingItem' style='display:none'>¡No se encontraron Proyectos!</p>";
    }

    public function ajaxTodos()
    {

        $item2 = "id_proyecto";
        $valor2 = $this->idCategoria;
        $respuesta2 = ControladorProyecto::ctrMostrarItem($item2, $valor2);
        foreach ($respuesta2 as $item2) {
            echo "<div class='parent-button-div' id='" . $this->idFiltro . "'>
                <img src=" . $item2["foto"] . " alt=''>
                <div class='button-div'>
                    <a class='c-button c-button--gooey' href='index.php?ruta=proyecto-eleccion&id=" . $item2["id_proyec_item"] . "'> Más info.
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
                </div>
                <div class='buttons-div-2'>
                    <p class='articulo'>" . $item2["titulo"] . "</p>
                </div>      
            </div>";
        }
        echo "<p class='nothingItem' style='display:none'>¡No se encontraron Proyectos!</p>";
    }
}



/*=============================================
TRAE LOS ITEMS DE ACUERDO A LOS FILTROS QUE SE APLIQUEN, YA SEA POR SECTOR O TIPO
=============================================*/

if (isset($_POST["idFiltro"])) {
    $valFiltro = new AjaxProyectos();
    $valFiltro->idFiltro = $_POST["idFiltro"];
    $valFiltro->ajaxFiltrar();
}
/*=============================================
MUESTRA TODOS LOS ITEMS YA SAE POR SECTOR O POR TIPO
=============================================*/

if (isset($_POST["idCategoria"])) {
    $todos = new AjaxProyectos();
    $todos->idCategoria = $_POST["idCategoria"];
    $todos->ajaxTodos();
}
