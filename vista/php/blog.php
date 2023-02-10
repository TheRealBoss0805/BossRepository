<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vista/css/blog.css">
    <title>Blog</title>
</head>

<body>
    <div class="contenedor-blog">
        <div class="content-blog-1">
            <div class="blog-1">
                <input type="hidden" id="idCategoria" value="">
                <input type="hidden" id="valorAnio" value="">
                <div>
                    <h1>BLOG</h1>
                    <h2>Todas las Categorías</h2>
                    <a class="active btnTodos">
                        <span>Todos</span>
                        <img src="vista/imagenes/blog/todo.png" alt="">
                    </a>
                    <a idCategoria="1" class="btnCategoria">
                        <span>Construcción</span>
                        <img src="vista/imagenes/blog/construccion.png" alt="">
                    </a>
                    <a idCategoria="2" class="btnCategoria">
                        <span>Economía</span>
                        <img src="vista/imagenes/blog/economia.png" alt="">
                    </a>
                    <a idCategoria="3" class="btnCategoria">
                        <span>Educación</span>
                        <img src="vista/imagenes/blog/educacion.png" alt=""> 
                    </a>
                    <a idCategoria="4" class="btnCategoria">
                        <span>Indeconsult</span>
                        <img src="vista/imagenes/blog/edificio.png" alt="">
                    </a>
                    <a idCategoria="5" class="btnCategoria">
                        <span>Salud</span>
                        <img src="vista/imagenes/blog/salud.png" alt="">
                    </a>
                </div>
                <img src="vista/imagenes/blog/blog.jpg" alt="" class="img-abs">
            </div>

    <div class='blog-1 no-responsive'>
        <h1>Posteos Recientes</h1>
        
        <?php
        
        $resp2registros = ControladorBlog::ctrMostrar2Publicaciones();
        foreach($resp2registros as $publicacion){
        echo "<div class='div-posteosR'>
            <div>
                <img src='vista/imagenes/extras/img-1.png' alt='' class='img-posteosR'>
                <a href='#'>".$publicacion["titulo"]."</a>
            </div>
            <div>
                <p>".$publicacion["descripcion"]."</p>
            </div>
        </div>";
        } 
        ?>
        
    </div>


            <div class="blog-1 no-responsive">
                <h1>Redes Sociales</h1>
                <div>
                    <a href="#" class="icon-whatsapp" style="--color: #1d9337;" title="Whatsapp"></a>
                    <a href="#" class="icon-twitter" style="--color: #2990be;" title="Twitter"></a>
                    <a href="#" class="icon-linkedin-rect" style="--color: #00586e;" title="Linkedin"></a>
                    <a href="#" class="icon-instagram" style="--color: #d33641;" title="Instagram"></a>
                </div>
            </div>
        </div>


        <div class="content-blog-2">
            <div class="blog-2">
                <div>
                    <h1>Archivos</h1>
                    <a class="btnAnio" anio="2023">Año 2023</a>
                    <a class="btnAnio" anio="2022">Año 2022</a>
                    <a class="btnAnio" anio="2021">Año 2021</a>
                </div>
                <div>
                    <form action="">
                    <input type="search" placeholder="Buscar...">
                    <input type="submit" value="Buscar">
                    </form>
                </div>
            </div>
            <div class='blog-2' id="publicaciones">


<?php
    $item = null;
    $valor = null;

    $itemdos = null;
    $valordos = null;

    $respuesta = ControladorBlog::ctrMostrarPublicaciones($item, $valor, $itemdos, $valordos);

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
    
?>
    
        
    </div>
            

            <div class="blog-2">
                <div>
                    <a href=""><span class="icon-left-open"></span>Regresar</a>
                    <a href="">Continuar<span class="icon-right-open"></span></a>
                </div>
                <div>
                    <span>0</span>
                    <span>/</span>
                    <span>0</span>
                </div>
            </div>

            <div class="blog-2">
                <h1>Video Informativo de IDC</h1>
                <video src="">

                </video>
            </div>
        </div>
        <div class="content-blog-1 responsive">
            <div class="blog-1 no-responsive">
            </div>

            <div class="blog-1">
                <h1>Posteos Recientes</h1>
                <div class="div-posteosR">
                    <div>
                        <img src="vista/imagenes/extras/img-1.png" alt="" class="img-posteosR">
                        <a href="#">Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Fuga, nihil corporis. Consequuntur ullam, repellat
                            praesentium dignissimos eveniet perferendis ut.</a>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis placeat expedita hic ad at
                            soluta iste deleniti veli.</p>
                    </div>
                </div>
            </div>

            <div class="blog-1">
                <h1>Redes Sociales</h1>
                <div>
                    <a href="#" class="icon-whatsapp" style="--color: #1d9337;" title="Whatsapp"></a>
                    <a href="#" class="icon-twitter" style="--color: #2990be;" title="Twitter"></a>
                    <a href="#" class="icon-linkedin-rect" style="--color: #00586e;" title="Linkedin"></a>
                    <a href="#" class="icon-instagram" style="--color: #d33641;" title="Instagram"></a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>