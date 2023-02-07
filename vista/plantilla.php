<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php
    /*
    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "nosotros" ||
         $_GET["ruta"] == "contactanos" ||
         $_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "perfiles"
         ){

        echo '<title>'.$_GET["ruta"].'</title>';

      }else{

        echo '<title>Page not found</title>';

      }

    }else{

      echo '<title>inicio</title>';

    }*/
  ?>

    <!--<title>IDC</title>-->

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" href="vista/imagenes/extras/logo-indeconsult.ico">

    <!--=====================================
  PLUGINS DE CSS
  ======================================-->

    <!-- Bootstrap 3.3.7 -->


    <!-- Fontello -->
    <link rel="stylesheet" href="vista/internet-components/idc-fontello/css/fontello.css">

    <!-- Plantilla -->
    <link rel="stylesheet" href="vista/css/plantilla.css">

    <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

    <!-- jQuery 3 -->
    <script src="vista/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->


    <!-- Plantilla -->


</head>

<!--=====================================
    CUERPO DOCUMENTO 
======================================-->

<body class="body">

    <?php
  if(isset($_GET["ruta"])){
    
    echo '<input type="hidden" class="ruta" value="'.$_GET["ruta"].'" >';
    
  }

   echo '<div class="contenedorPadre">';

    /*=============================================
    HEAD
    =============================================*/

    include "php/navegador-fijo.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "nosotros" ||
         $_GET["ruta"] == "contactanos" ||
         $_GET["ruta"] == "servicios" ||
         $_GET["ruta"] == "servicios-eleccion" ||
         $_GET["ruta"] == "proyectos" ||
         $_GET["ruta"] == "proyecto-eleccion" ||
         $_GET["ruta"] == "servicios-sector" ||
         $_GET["ruta"] == "blog" ||
         $_GET["ruta"] == "blog-seleccion" ||
         $_GET["ruta"] == "inicio"
         ){


        include "php/".$_GET["ruta"].".php";

      }else{

        include "php/404.php";

      }

    }else{

      include "php/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/
    include "php/chatbot.php";

    include "php/footer.php";

    echo '</div>';
  ?>
    <script src="vista/js/ruta-navegador.js"></script>

    <!--Start of Tawk.to Script-->
    <!--<script type="text/javascript">
    /*var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/63d431bbc2f1ac1e202ffc11/1gnqe4hqh';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    </script>
    End of Tawk.to Script-->
    

</body>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="vista/js/inicio.js"></script>
<script src="vista/js/imagen-modal-seleccion.js"></script>
<script src="vista/js/proyecto.js"></script>

</html>