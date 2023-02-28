<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <!-- ===== Link Swiper's CSS ===== -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- ===== Fontawesome CDN Link ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="vista/css/inicio.css">
    <title>Inicio</title>
</head>

<body>
    <div class="contenedor-inicio" id="inicioPadre">
        <!--INICIO 1-->
        <div class="inicio-1">
            <div class="content-slider">
                <div class="slider-top">
                    <div id="div-slider-top">
                        <section class="section-slider">
                            <div class="slider">
                                <?php
                                $portada = ControladorPortada::ctrMostrar8Portadas();
                                $portadaReverse = array_replace($portada);
                                foreach ($portadaReverse as $filtro) {
                                    $anio = date("Y", strtotime($filtro["fecha"]));
                                    $dia = date("d", strtotime($filtro["fecha"]));
                                    $mes = date("m", strtotime($filtro["fecha"]));
                                    echo "
                                <div class='slide' style='background-image: url(" . $filtro["imagen"] . ")'>
                                    <div class='container'>
                                        <div class='caption'>
                                            <a href='https://www.facebook.com/institutodeconsultoriasa' target='blank'>
                                                <h1>" . $dia . " / " . $mes . " / " . $anio . "</h1>
                                                <p>" . $filtro["titulo"] . "</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                    ";
                                }
                                ?>
                            </div>
                        </section>
                    </div>
                    <div class="controls">
                        <div class="icon-left-dir"></div>
                        <div class="icon-right-dir"></div>
                    </div>
                    <div class="indicator">
                    </div>
                </div>
            </div>
        </div>
        <!--INICIO 2-->
        <div class="inicio-2">
            <div class="title-inicio">
                <h2>NUESTROS SERVICIOS</h2>
            </div>
            <div class="content-service contenedores">
                <?php
                for ($i = 1; $i < 5; $i++) {
                    $item = "id_servicio";
                    $valor = $i;
                    $respuesta = ControladorServicios::ctrMostrarServicio($item, $valor);
                    $separador = "<br>";
                    $cadena = $respuesta["descripcion"];
                    $stringSeparado = explode($separador, $cadena);
                    $cad = $stringSeparado[0];
                    $caracteres = 142;
                    $cadenaAcortada = substr($cad, 0, $caracteres) . '...';
                    $id = $respuesta["id_servicio"];

                    echo "
                        <div class='service-$id div'>
                            <a href='index.php?ruta=servicios&id=$id' class='hola'>
                                <div class='glass-div'></div>
                                <span>
                                    <img src=" . $respuesta['portada'] . " alt=''>
                                </span>
                                <div class='div-plus' style=''>
                                    <div class='icon-plus-1'></div>
                                    <div class='div-plus-txt'>
                                        <span class='icon-info-circled'></span>
                                        <span>Ver más</span>
                                    </div>
                                </div>
                            </a>
                            <div class='description-service'>
                                <h3 style='color: #253743;'>" . $respuesta["nombre"] . "</h3>
                                <p>" . $cadenaAcortada . "</p>
                            </div>
                            <img src='vista/imagenes/extras/munecos/$i.png' alt='' class='muneco-service'>
                        </div>";
                }
                ?>
            </div>
        </div>
        <!--INICIO 3-->
        <div class="inicio-3">
            <div class="title-inicio">
                <h2>Trabajos recientes</h2>
                <p>Últimos trabajos realizados por la Empresa.</p>
            </div>
            <section class="slide3">
                <div class="swiper mySwiper maximum" id="swiperGtfo">
                    <div class="swiper-wrapper content">
                        <?php
                        for ($i = 1; $i < 5; $i++) {
                            $item = "id_servicio";
                            $valor = $i;
                            $respuesta  = ControladorServicios::ctrMostrarServicio($item, $valor);
                            $otherRespuesta = ControladorServicios::ctrMostrarItem($item, $valor);
                            $separador = "<br>";

                            $respuestaReverse = array_reverse($otherRespuesta);
                            $filtro = [$respuestaReverse[0], $respuestaReverse[1], $respuestaReverse[2]];

                            foreach ($filtro as $item) {

                                $cadena = $item["descripcion"];
                                $stringSeparado = explode($separador, $cadena);
                                $cad = $stringSeparado[0];
                                $caracteres = 150;
                                $cadenaAcortada = substr($cad, 0, $caracteres) . '...';
                                $id = $item["id_serv_item"];

                                echo "<div class='swiper-slide card'>
                                
                                        <div class='icon-plus icono-card' id='icon'>
                                        </div>
                                        <div class='card-content' id='despegar-profession'>
                                            <div class='image'>
                                                <a href='index.php?ruta=servicios-eleccion&idItem=$id'>
                                                    <img src='" . $item["foto"] . "'>
                                                </a>
                                            </div>
                                            <div class='name-profession'>
                                                <span class='name'>" . $item["titulo"] . "</span>
                                                <span class='profession'>" . $cadenaAcortada . "</span>
                                            </div>
                                        </div>";
                                echo "
                                        <div class='card-down' id='card-down'>
                                            <i class='fi fi-sr-chevron-double-down'></i>
                                        </div>
                                    </div>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </section>
            <img src="vista/imagenes/extras/munecos/6.png" alt="" class="muneco-major">
        </div>
        <!--INICIO 4-->
        <div class="inicio-4">
            <div class="title-inicio">
                <h2>Noticias sobre la Empresa y el Sector</h2>
            </div>
            <div class="contenedor-4">
                <div class="content4-ct0">
                    <div class="ct0-texto">
                        <h2>¡NOTICIAS RECIENTES!</h2>
                        <p>Indeconsult S.A. Es una empresa
                            dedicada a ofrecer soluciones a diversas
                            necesidades de nuestros clientes, basándonos en la
                            ética, honestidad, compromiso y buenos valores.
                        </p>
                    </div>
                    <div class="ct0-button">
                        <a href="blog">Ver más noticias</a>
                    </div>
                </div>
                <div class="content4-ct">
                    <?php
                    $resp4registros = ControladorBlog::ctrMostrar4Publicaciones();
                    $ultimos4Blog = array_reverse($resp4registros);
                    foreach ($ultimos4Blog as $publicacion) {
                        $anio = date("Y", strtotime($publicacion["fecha"]));
                        $dia = date("d", strtotime($publicacion["fecha"]));
                        $mes = date("m", strtotime($publicacion["fecha"]));
                        echo "
                        <div class='child1-min'>
                        <div class='child1-img'>
                            <div href='index.php?ruta=blog-seleccion&id=" . $publicacion["id_blog_pub"] . "' class='front'>
                                <img src=" . $publicacion["imagen"] . " alt=''>
                            </div>
                            <div class='back'>
                                <h3>" . $publicacion["titulo"] . "</h3>
                                <p>" . $dia . "-" . $mes . "-" . $anio . "</p>
                                <a href='index.php?ruta=blog-seleccion&id=" . $publicacion["id_blog_pub"] . "' title='Ver más'>
                                    <span class='icon-news'></span>
                                </a>
                            </div>
                        </div>
                    </div>
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--INICIO 5-->
        <div class="inicio-5">
            <div class="title-inicio">
                <h2>Instituto de consultoría S.A</h2>
            </div>
            <div class="contenedor-5">
                <div class="content-5">
                    <div class="content-5-min1">
                        <p>Promover la Inversión Pública y Privada en un marco<br> de Competencia y Eficiencia.</p>
                        <img src="vista/imagenes/inicio/valores/Mision.png" alt="" class="valor1">
                    </div>
                    <div class="content-5-min2 min2-1">
                        <h1>MISIÓN</h1>
                    </div>
                </div>
                <div class="content-5">
                    <div class="content-5-min2 min2-2">
                        <h1>VISIÓN</h1>
                    </div>
                    <div class="content-5-min1">
                        <p>Convertirnos en la empresa líder en Consultoría de<br> Inversión Pública y Privada.</p>
                        <img src="vista/imagenes/inicio/valores/vision.png" alt="" class="valor2">
                    </div>
                </div>
                <div class="content-5">
                    <div class="contenedor-5-burbuja">
                        <?php
                        for ($i = 1; $i < 5; $i++) {
                            echo "
                            <div class='content-5-burbuja burbujaColor' style=''>
                            <div class='burbuja-5'>
                                <img src='vista/imagenes/inicio/valores/$i.jpg' alt=''>
                                <p class='valor'></p>
                            </div>
                        </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="content-5-min3">
                        <h1>NUESTROS VALORES</h1>
                    </div>
                </div>
            </div>
        </div>
        <!--INICIO 6-->
        <div class="inicio-6">
            <div class="contenedor-inicio-6">
                <div class="title-inicio">
                    <h2 style="color: #fff">Normas ISO</h2>
                    <p style="color: #fff">SGC cumple con los requisitos de la Norma ISO.</p>
                </div>
                <div class="title-inicio-2">
                    <h2 style="color: #fff">SOMOS INDECONSULT S.A</h2>
                </div>
                <div class="contenedor-padre-6">
                    <div class="contenedor-6">
                        <div class="content6-1">
                            <?php
                            /*26, 9001, 14001,37001,45001*/
                            for ($i = 1; $i < 6; $i++) {
                                echo "
                                <div class='imgBx' style='--i:$i;' data-id='contenedor$i'>
                                    <img src='vista/imagenes/inicio/isos/$i.png'>
                                </div>
                                ";
                            }
                            ?>
                        </div>
                        <div class="content6-2">
                            <?php
                            for ($i = 1; $i < 6; $i++) {
                                echo "
                                    <div class='contentBx' id='contenedor$i'>
                                        <div class='card-content6-2'>
                                            <div class='imgBx'>
                                                <img src='vista/imagenes/inicio/isos/$i.png'>
                                            </div>
                                            <div class='textBx'>
                                                <h2 class='iso'></h2>
                                                <p class='isoInfo'></p>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="contenedor-6-2">
                        <div class="title-inicio-3">
                            <h2 style="color: #fff">SOMOS INDECONSULT S.A</h2>
                        </div>
                        <div class="content6-3">
                            <div class="padre-contador">
                                <div class="hijo-contador hideee">
                                    <span><img src="vista/imagenes/extras/proyecto.png" alt=""></span>
                                    <span>Proyectos completados</span>
                                    <span class="count-cantidad-padre">
                                        <span id="count1" class="count-cantidad" data-cantidad-total="1500">0</span>
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                                <div class="hijo-contador hideee">
                                    <span><img src="vista/imagenes/extras/fundacion.png" alt=""></span>
                                    <span>Año de Fundación</span>
                                    <span id="count2" class="count-cantidad" data-cantidad-total="1995">0</span>
                                </div>
                            </div>
                            <div class="padre-contador">
                                <div class="hijo-contador hideee">
                                    <span><img src="vista/imagenes/extras/profesional.png" alt=""></span>
                                    <span>Profesionales</span>
                                    <span class="count-cantidad-padre">
                                        <span id="count3" class="count-cantidad" data-cantidad-total="100">0</span>
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                                <div class="hijo-contador hideee">
                                    <span><img src="vista/imagenes/extras/experience.png" alt=""></span>
                                    <span>Años de experiencia</span>
                                    <span id="count4" class="count-cantidad" data-cantidad-total="26">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--INICIO 7-->
        <div class="inicio-7">
            <div class="contenedor-7">
                <div class="title-inicio">
                    <h2>INFORMACIÓN GENERAL</h2>
                </div>
                <div class="content7-1">

                    <div class="content7-rep">
                        <div class="represent-think">
                            <img src="vista/imagenes/extras/vineta.png" alt="">
                            <p>" ¡Pienso, luego existo! "</p>
                        </div>
                        <div class="represent-img">
                            <img src="vista/imagenes/extras/mujer.jpg" alt="" class="img">
                        </div>
                        <div class="represent-info">
                            <h3>Danitza Zulema Echandia Moreno</h3>
                            <h2>GERENTE GENERAL</h2>
                            <a href="https://pe.linkedin.com/" title="Linkedin"><span class="icon-linkedin-rect"></span></a>
                        </div>
                    </div>

                </div>
                <div class="content7-2">
                    <div class="content7-titulo">
                        <h2>ORGANIGRAMA DE LA EMPRESA</h2>
                    </div>
                    <div class="content7-orga">
                        <img src="vista/imagenes/inicio/organigrama/organigrama.png" alt="">
                    </div>
                </div>
                <button class="download-button">
                    <div class="docs">
                        <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="20" width="20" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line y2="13" x2="8" y1="13" x1="16"></line>
                            <line y2="17" x2="8" y1="17" x1="16"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg> Organigrama
                    </div>
                    <a href="https://drive.google.com/file/d/1GdRUQeoXNH0Nu1-CyK_HUQ46G9jD_n1h/view?usp=sharing" style="text-decoration: none; color: white;">
                        <div class="download">
                            <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="24" width="24" viewBox="0 0 24 24">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line y2="3" x2="12" y1="15" x1="12"></line>
                            </svg>
                        </div>
                    </a>
                </button>
            </div>
        </div>
        <!--INICIO 8-->
        <div class="inicio-8">
            <div class="contenedor-8">
                <div class="title-inicio">
                    <h2>NUESTROS PROVEEDORES</h2>
                </div>
                <div class="content8">
                    <!--PROVEEDORES: bitech, ibnet, impacto, plaza-vea, promart, sodimac, tailoy-->
                    <?php
                    for ($j = 0; $j < 2; $j++) {
                        for ($i = 1; $i < 8; $i++) {
                            if ($i == 1 || $i == 2 || $i == 7) {
                                $formato = "jpg";
                            }
                            if ($i == 3 || $i == 4 || $i == 5 || $i == 6) {
                                $formato = "png";
                            }
                            echo "  <div class='content8-slide'>
                                        <img src='vista/imagenes/inicio/proveedores/$i.$formato' alt=''>
                                    </div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="vista/js/inicio.js"></script>

</html>