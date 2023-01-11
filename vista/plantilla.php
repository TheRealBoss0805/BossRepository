<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php
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

    }
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
  
  <!-- Bootstrap 3.3.7 -->


  <!-- Plantilla -->


</head>

<!--=====================================
    CUERPO DOCUMENTO 
======================================-->

<body>
 
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

    include "php/footer.php";

    echo '</div>';

  ?>
  







