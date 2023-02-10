<?php

require_once "../controlador/blogPublicaciones.controlador.php";
require_once "../modelos/blogPublicaciones.modelo.php";

class AjaxBlog{

	/*=============================================
	TRAE LOS ITEMS DE ACUERDO A LOS FILTROS QUE SE APLIQUEN, YA SEA POR SECTOR O TIPO
	=============================================*/	

    public $idCategoria;
	public $valorAnio;
   
	public function ajaxFiltrar(){

        $item = "id_blog_cat";
        $valor = $this->idCategoria;
        
        $item2 = "fecha";
        $valor2 = $this->valorAnio;

        if($valor == ""){
            $valor=null;
        }else if($valor2 == ""){
            $valor2 =null;
        }
   
		$respuesta = ControladorBlog::ctrMostrarPublicaciones($item, $item2, $valor, $valor2);
        if(!$respuesta){
            echo "No se encontraron resultados";
        }else{
    
            foreach($respuesta as $item){
                
                echo "<div class='div-archivos-blog'>";
                $item4 = "id_blog_tipo";
                $valor4 = $item["id_blog_tipo"];
                $respuestaTipoZona = ControladorBlog::ctrTraerTipoZona($item4, $valor4 );
                
                $anio = date("Y", strtotime($item["fecha"]));
                $dia = date("d", strtotime($item["fecha"]));
                $mes = date("m", strtotime($item["fecha"]));
                
                echo "
                    <div>
                        <img src='vista/imagenes/extras/img-1.png' alt=''>
                    </div>
                    <div>
                        <span>".$dia."-".$mes."-".$anio."<i class='icon-plus'></i></span>
                        <span>".$respuestaTipoZona["nombre"]."<i class='icon-plus'></i></span>
                        <span>";
                        $item2="id_blog_pub";
                        $valor2=$item["id_blog_pub"];
                        $respuesta2 = ControladorBlog::ctrTraerIdCategoria($item2,$valor2);

                        foreach($respuesta2 as $i => $categoria){
                            $item3="id_blog_cat";
                            $valor3 = $categoria["id_blog_cat"];
                            $respuesta3 = ControladorBlog::ctrTraerCategoria($item3, $valor3);
                            echo $respuesta3["nombre"];
                            $posicion = count($respuesta2)-1;
                            if($i != $posicion){
                                echo " - ";   
                            }
                        }


                    echo "<i class='icon-plus'></i>
                    </span>
                    </div>
                    <div>
                        <p>".$item["titulo"]."</p>
                        <a href='index.php?ruta=blog-seleccion&id=".$item["id_blog_pub"]."'><span>Leer más</span></a>
                    </div>
                </div>";

            }
}
}
    
}



/*=============================================
TRAE LOS ITEMS DE ACUERDO A LOS FILTROS QUE SE APLIQUEN, YA SEA POR SECTOR O TIPO
=============================================*/

if(isset( $_POST["idCategoria"]) && isset($_POST["valorAnio"])){
	$filtro = new AjaxBlog();
	$filtro -> idCategoria = $_POST["idCategoria"];
    $filtro -> valorAnio = $_POST["valorAnio"];
	$filtro -> ajaxFiltrar();
}
