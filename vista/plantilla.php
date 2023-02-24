<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vista/imagenes/extras/logo-indeconsult.ico">

  <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Fontello -->
  <link rel="stylesheet" href="vista/internet-components/idc-fontello/css/fontello.css">

  <!-- Uicons -->
  <link rel="stylesheet" href="vista/internet-components/uicons/css/uicons-solid-rounded.css">

  <!-- Plantilla -->
  <link rel="stylesheet" href="vista/css/plantilla.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vista/bower_components/jquery/dist/jquery.min.js"></script>

</head>

<!--=====================================
    CUERPO DOCUMENTO 
======================================-->

<body class="body">

  <?php
  if (isset($_GET["ruta"])) {

    echo '<input type="hidden" class="ruta"  id="ruta" value="' . $_GET["ruta"] . '" >';
  }

  echo '<div class="contenedorPadre">';

  /*=============================================
    HEAD
    =============================================*/

  include "php/navegador-fijo.php";

  /*=============================================
    CONTENIDO
    =============================================*/

  if (isset($_GET["ruta"])) {

    if (
      $_GET["ruta"] == "nosotros" ||
      $_GET["ruta"] == "contactanos" ||
      $_GET["ruta"] == "servicios" ||
      $_GET["ruta"] == "servicios-eleccion" ||
      $_GET["ruta"] == "proyectos" ||
      $_GET["ruta"] == "proyecto-eleccion" ||
      $_GET["ruta"] == "blog" ||
      $_GET["ruta"] == "blog-seleccion" ||
      $_GET["ruta"] == "inicio"
    ) {


      include "php/" . $_GET["ruta"] . ".php";
    } else {

      include "php/404.php";
    }
  } else {

    include "php/inicio.php";
  }

  /*=============================================
    FOOTER
    =============================================*/
  include "php/chatbot.php";

  include "php/footer.php";

  include "php/deslizador.php";

  echo '</div>';
  ?>

</body>

<script src="vista/js/deslizador.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="vista/js/inicio.js"></script>
<script src="vista/js/imagen-modal-seleccion.js"></script>
<script src="vista/js/proyecto.js"></script>
<script src="vista/js/ruta-navegador.js"></script>
<script src="vista/js/blog.js"></script>
</html>