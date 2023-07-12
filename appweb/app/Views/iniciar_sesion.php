<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Ejercicio 3 de la Guia de Actividades de Taller de Aplicaciones Web">
        <meta name="keywords" content="HTML, JS, CSS, Guia de Actividades">
        <meta name="author" content="Tomas Cardozo, Martin Ojeda">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('Taller-web-tp3/appweb/public/assets/css/style.css'); ?>">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <link rel="icon" href="<?php echo base_url('/favicon.ico'); ?>">
        <title>Video Trend</title>
    </head>
    <body>
        <header>
            <div class="imagen_header">
                <a href="http://localhost/Taller-web-tp3/appweb/public/User/mostrar_login" id="link_imagen"><img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/logo.png'); ?>" id="imagen_boton_play"></a>
            </div>
            <div class="titulo">
                <a href="http://localhost/Taller-web-tp3/appweb/public/User/mostrar_login" id="link_titulo"><h1>Video Trend</h1></a>
            </div>
            <div>
                <p>Mira tus videos de Youtube como quieras</p>
            </div>
        </header>
        <nav class="menu">
            <ul>
                <a href="http://localhost/Taller-web-tp3/appweb/public/User/register" class="link_menu"><li class="menu_superior">Crear una Cuenta</li></a>
                <li class="menu_superior">|</li>
                <a href="" class="link_menu"><li class="menu_superior">Olvide mi contraseña</li></a>
                <li class="menu_superior">|</li>
                <a href="" class="link_menu"><li class="menu_superior">Acerca de Nosotros</li></a>
            </ul>
        </nav>
        <div class="centro">
            <section class="banner">
                <img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/welcome_videotrend.png'); ?>" id="imagen_banner" onclick="cambiarImagen()"> 
                <!--Invocacion a la funcion 'cambiarImagen' en el script 'Actividad2C' al hacer click sobre el banner-->
            </section>
            <section class="formulario">
                <article>
                    <form action="iniciar_sesion" class="datos_inicio_sesion" method="post">
                        <input type="email" name="email" class="campo" id="email">
                        <label class="descripcion">E-mail</label>
                        <input type="password" name="contrasenia" class="campo" id="contrasenia">
                        <label class="descripcion">Contraseña</label>
                        <button id="b_iniciar">Iniciar Sesion</button>
                    </form>
                </article>
                <hr>
                <article class="registro_nuevo_usuario">
                    <form action="http://localhost/Taller-web-tp3/appweb/public/User/register"> 
                        <button type="submit" id="b_crear"> Crear una cuenta </button>
                    </form>
                </article>
            </section>
        </div>
        <footer class="pie_de_pagina">
            <ul class="menu_inferior">
                <a href="https://www.youtube.com/" class="link_menu" target="_blank"><li class="texto_menu_inferior">YouTube</li></a>
                <li class="texto_menu_inferior">-</li>
                <a href="https://www.ugd.edu.ar/" class="link_menu" target="_blank"><li class="texto_menu_inferior">U.G.D.</li></a>
                <li class="texto_menu_inferior">-</li>
                <a href="https://campusvirtual.ugd.edu.ar/" class="link_menu" target="_blank"><li class="texto_menu_inferior">Campus Virtual</li></a>
            </ul>
        </footer>
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/js/TP2_eje_1_a.js'); ?>"></script>
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/js/TP2_eje_1_b.js'); ?>"></script>
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/css/style.css'); ?>"></script>
        </body>

</html>