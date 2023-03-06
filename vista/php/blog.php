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
                        <i class="fi fi-sr-layout-fluid"></i>
                    </a>
                    <a idCategoria="1" class="btnCategoria">
                        <span>Construcción</span>
                        <i class="fi fi-sr-truck-tow"></i>
                    </a>
                    <a idCategoria="2" class="btnCategoria">
                        <span>Economía</span>
                        <i class="fi fi-sr-donate"></i>
                    </a>
                    <a idCategoria="3" class="btnCategoria">
                        <span>Educación</span>
                        <i class="fi fi-sr-license"></i>
                    </a>
                    <a idCategoria="4" class="btnCategoria">
                        <span>Indeconsult</span>
                        <i class="fi fi-sr-city"></i>
                    </a>
                    <a idCategoria="5" class="btnCategoria">
                        <span>Salud</span>
                        <i class="fi fi-sr-doctor"></i>
                    </a>
                </div>
                <img src="vista/imagenes/blog/blog.jpg" alt="" class="img-abs">
            </div>


            <div class="blog-1 no-responsive">
                <h1>Posteos Recientes</h1>

                <?php

                $resp2registros = ControladorBlog::ctrMostrar2Publicaciones();
                foreach ($resp2registros as $publicacion) {
                    echo "<div class='div-posteosR'>
                    <div>
                        <img src=" . $publicacion["imagen"] . " alt='' class='img-posteosR'>
                        <a href='index.php?ruta=blog-seleccion&id=" . $publicacion["id_blog_pub"] . "'>" . $publicacion["titulo"] . "</a>
                    </div>
                    <div>
                        <p>" . $publicacion["descripcion"] . "</p>
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
                    <a class="btnAnio" anio="2017">Año 2017</a>
                    <a class="btnAnio" anio="2016">Año 2016</a>
                    <a class="btnAnio" anio="2015">Año 2015</a>
                </div>
            </div>

            <div class="blog-2" id="publicaciones">

                <?php
                $item = null;
                $valor = null;

                $itemdos = null;
                $valordos = null;

                $tamanio_pagina = 2;
                $pagina = 1;


                $num_filas = ControladorBlog::ctrContarPublicaciones($item, $valor, $itemdos, $valordos);

                $total_paginas = ceil($num_filas / $tamanio_pagina);
                $empezar_desde = ($pagina - 1) * $tamanio_pagina;

                $respuesta = ControladorBlog::ctrMostrarPublicaciones($item, $valor, $itemdos, $valordos, $empezar_desde, $tamanio_pagina);

                echo "<input type='hidden' id='input_total_pages' value='$total_paginas'>";
                echo "<input type='hidden' id='input_page' value='$pagina'>";

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
                        <span>" . $dia . "-" . $mes . "-" . $anio . "<i class='fi fi-sr-calendar-clock'></i></span>
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
                        <a href='index.php?ruta=blog-seleccion&id=" . $item["id_blog_pub"] . "' class='blogs-item'><span>Leer más</span></a>
                    </div>
                </div>";
                }
                ?>
            </div>

            <div class="blog-2">
                <div>
                    <a href="javascript:prevPage()" id="btnBefore"><span class="icon-left-open"></span>Regresar</a>
                    <a href="javascript:nextPage()" id="btnAfter">Continuar<span class="icon-right-open"></span></a>
                </div>
                <div>
                    <span id="page"><?= ($total_paginas == 0) ? 0 : $pagina ?></span>
                    <span>/</span>
                    <span id="total_pages"><?= $total_paginas ?></span>
                </div>
            </div>

            <div class="blog-2">
                <h1>Video Informativo de IDC</h1>
                <video src="vista/video/IDC-VIDEO.mp4" poster="" preload="auto" controls>
                </video>
            </div>
        </div>
        <div class="content-blog-1 responsive">
            <div class="blog-1 no-responsive">
            </div>

            <div class="blog-1">
                <h1>Posteos Recientes</h1>

                <?php

                $resp2registros = ControladorBlog::ctrMostrar2Publicaciones();
                foreach ($resp2registros as $publicacion) {
                    echo "<div class='div-posteosR'>
                            <div>
                                <img src=" . $publicacion["imagen"] . " alt='' class='img-posteosR'>
                                <a href='index.php?ruta=blog-seleccion&id=" . $publicacion["id_blog_pub"] . "'>" . $publicacion["titulo"] . "</a>
                            </div>
                            <div>
                                <p>" . $publicacion["descripcion"] . "</p>
                            </div>
                        </div>";
                }
                ?>
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