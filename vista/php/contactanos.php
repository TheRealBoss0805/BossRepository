<?php
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vista/css/contactanos.css">
    <title>¡Contáctenos!</title>
</head>

<body>
    <section class="contact">

        <div class="imagen-contact-inicio">
            <img src="vista/imagenes/extras/portada_contacto.jpg" alt="">
        </div>

        <div class="contacto-imagen">
            <div class="contacto-p">
                <p>Entra en Contacto</p>
            </div>
            <img src="vista/imagenes/extras/Contact-Us.png" alt="">
        </div>

        <div class="content">
            <!--<h2>Contáctanos</h2>-->
            <p>¿Tienes consultas sobre nuestros servicios y proyectos? Comunícate
                con nosotros a través de nuestros correos y números telefónicos.</p>
        </div>

        <div class="container">

            <div class="contactInfo">
                <h1>Información de Contacto</h1>
                <div class="box">
                    <div class="icon"><ion-icon name="location-outline"></ion-icon></div>
                    <div class="text">
                        <h3>Úbicanos en:</h3>
                        <p>Jr. Monterosa 233 Santiago de Surco, Lima Oficina. 507</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><ion-icon name="call-outline"></ion-icon></div>
                    <div class="text">
                        <h3>Llámanos al:</h3>
                        <p>(51) (1) 2439211</p>
                        <p>(51) (1) 2439212</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><ion-icon name="mail-outline"></ion-icon></div>
                    <div class="text">
                        <h3>Escríbenos a:</h3>
                        <p>
                            <span>secretaria@indeconsult.pe</span>
                            <span>institutodeconsultoriasa@yahoo.com</span>
                            <span>institutodeconsultoriasa@gmail.com</span>
                        </p>
                        <h3 class="br">También a:</h3>
                        <p>
                            <span>Información: secretaria@indeconsult.pe</span>
                            <span>Licitaciones: comercial@indeconsult.pe</span>
                            <span>Ingeniería: ingenieria@indeconsult.pe</span>
                            <span>Proyectos: proyectos@indeconsult.pe</span>
                            <span>Administración: administración@indeconsult.pe</span>
                        </p>
                    </div>
                </div>
                <h2 class="txt">Contáctate con Nosotros</h2>
                <ul class="sci">
                    <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                </ul>
            </div>

            <div class="contactForm">
                <form action="https://formsubmit.co/fernandorivera0597@gmail.com" method="POST" class="formContact">
                    <h2>Enviar Mensaje</h2>
                    <div class="inputBox">
                        <input type="text" name="name" required="required" class="inputForm">
                        <label for="name" class="labelForm">Nombre Completo</label>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" required="required" class="inputForm">
                        <label for="email" class="labelForm">Correo</label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="phone" required="required" class="inputForm">
                        <label for="phone" class="labelForm">Teléfono</label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="asunto" required="required" class="inputForm">
                        <label for="asunto" class="labelForm">Asunto</label>
                    </div>
                    <div class="inputBox">
                        <textarea name="comentario" required="required" class="inputForm"></textarea>
                        <label for="comentario" class="labelForm">Escribe tu mensaje...</label>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Enviar">
                    </div>
                    <input type="hidden" name="_next" value="http://localhost/BossRepository">
                    <input type="hidden" name="_captcha" value="false">
                </form>
            </div>
        </div>
        <div class="contact-mapBox">
            <div class="mapBox">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.004572728743!2d-76.9925062856853!3d-12.111839191423954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7ec7e400001%3A0xbdf539479d774ffb!2sINDECONSULT%20SA!5e0!3m2!1ses-419!2spe!4v1671832769734!5m2!1ses-419!2spe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
</body>

</html>