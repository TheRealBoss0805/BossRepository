<?php

require_once "../controlador/blogPublicaciones.controlador.php";
require_once "../modelos/blogPublicaciones.modelo.php";

class AjaxBlog
{

    /*=============================================
	TRAE LOS ITEMS DE ACUERDO A LOS FILTROS QUE SE APLIQUEN, YA SEA POR SECTOR O TIPO
	=============================================*/

    public $idCategoria;
    public $valorAnio;
    public $valorPagina;

    public function ajaxFiltrar()
    {

        $item = "id_blog_cat";
        $valor = $this->idCategoria;

        $item2 = "fecha";
        $valor2 = $this->valorAnio;

        $pagina = $this->valorPagina;

        if ($valor == "") {
            $valor = null;
        } else if ($valor2 == "") {
            $valor2 = null;
        }

        $tamanio_pagina = 2;

        $num_filas = ControladorBlog::ctrContarPublicaciones($item, $valor, $item2, $valor2);

        $total_paginas = ceil($num_filas / $tamanio_pagina);
        $empezar_desde = ($pagina - 1) * $tamanio_pagina;

        echo "<input type='hidden' id='input_total_pages' value='$total_paginas'>";
        echo "<input type='hidden' id='input_page' value='$pagina'>";
        $respuesta = ControladorBlog::ctrMostrarPublicaciones($item, $item2, $valor, $valor2, $empezar_desde, $tamanio_pagina);

        if (!$respuesta) {
            echo "<p class='notFoundBlog'>¡No se encontraron resultados!</p>";
        } else {
            foreach ($respuesta as $item) {
                echo "<div class='div-archivos-blog' id='idBlog'>";
                $item4 = "id_blog_tipo";
                $valor4 = $item["id_blog_tipo"];
                $respuestaTipoZona = ControladorBlog::ctrTraerTipoZona($item4, $valor4);
                $anio = date("Y", strtotime($item["fecha"]));
                $dia = date("d", strtotime($item["fecha"]));
                $mes = date("m", strtotime($item["fecha"]));
                echo "
                <div>
                    <img src=" . $item["imagen"] . " alt=''>
                </div>
                <div>
                    <span>" . $dia . " - " . $mes . " - " . $anio . "<i class='fi fi-sr-calendar-clock'></i></span>
                    <span>" . $respuestaTipoZona["nombre"] . "<i class='fi fi-sr-code-compare'></i></span>
                    <span>";
                $item2 = "id_blog_pub";
                $valor2 = $item["id_blog_pub"];
                $respuesta2 = ControladorBlog::ctrTraerIdCategoria($item2, $valor2);
                foreach ($respuesta2 as $i => $categoria) {
                    $item3 = "id_blog_cat";
                    $valor3 = $categoria["id_blog_cat"];
                    $respuesta3 = ControladorBlog::ctrTraerCategoria($item3, $valor3);
                    echo $respuesta3["nombre"];
                    $posicion = count($respuesta2) - 1;
                    if ($i != $posicion) {
                        echo " - ";
                    }
                }
                echo  "<i class='fi fi-sr-grid'></i>
                    </span>
                    </div>
                    <div>
                    <p class='articuloB'>" . $item["titulo"] . "</p>
                        <a href='index.php?ruta=blog-seleccion&id=" . $item["id_blog_pub"] . "'><span>Leer más</span></a>
                    </div>
                </div>";
            }
        }
    }
}

/*=============================================
TRAE LOS ITEMS DE ACUERDO A LOS FILTROS QUE SE APLIQUEN, YA SEA POR SECTOR O TIPO
=============================================*/

if (isset($_POST["idCategoria"]) && isset($_POST["valorAnio"]) && isset($_POST["pagina"])) {
    $filtro = new AjaxBlog();
    $filtro->idCategoria = $_POST["idCategoria"];
    $filtro->valorAnio = $_POST["valorAnio"];
    $filtro->valorPagina = $_POST["pagina"];
    $filtro->ajaxFiltrar();
}
