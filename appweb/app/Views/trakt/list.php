<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Home Page de la Guia de Actividades 3 de Taller de Aplicaciones Web">
    <meta name="keywords" content="CodeIgniter, Guia de Actividades">
    <meta name="author" content="IRALA - ALVARENGA">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://apis.google.com/js/api.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('Taller-web-tp3/appweb/public/assets/css/stilo.css'); ?>">
    <link rel="icon" href="<?php echo base_url('/favicon.ico'); ?>">
    <title>Video Trend - Home Page</title>
</head>
<body>
    <header class="barra_superior_home_page">
        <div class="imagen_header">
            <a href="http://localhost/Taller-web-tp3/appweb/public/User/mostrar_login" id="link_imagen">
                <img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/logo.png'); ?>" id="imagen_boton_play"></a>
        </div>
        <div class="titulo">
            <a href="http://localhost/Taller-web-tp3/appweb/public/User/mostrar_login" id="link_titulo"><h1>Video Trend</h1></a>
        </div>
        <div class="usuario_home_page" id="seccion_cabecera_usuario">
            <a href="URL_DEL_ENLACE">
                <img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/confi.png'); ?>" width="50px" class="imagen_usuario">
                NombreDelUsuario
            </a>
        </div>
    </header>

    <div class="campos_busqueda">
        <input type="text" id="tituloPelicula" placeholder="Título de la película" name="tituloPelicula">
        <input type="text" id="categoriaPelicula" placeholder="Categoría de la película" name="categoriaPelicula">
        <button onclick="buscarPelicula()">Buscar</button>
    </div>

    <h1 >RESULTADOS DE LA BÚSQUEDA</h1>
    <div class="seccion_resultados_busqueda" id="seccion_resultados_busqueda">
        <div class="seccion_video" id="seccion_video_busqueda">
            <div id="example_busqueda" class="tabla-videos">
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Año</th>
                            <th>Género</th>
                            <th>Espectadores</th>
                            <th>Codigo</th>
                            <th>Ver Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($results)) : ?>
                            <?php foreach ($results as $movie) : ?>
                                <tr>
                                    <td><?php echo $movie->movie->title; ?></td>
                                    <td><?php echo $movie->movie->year; ?></td>
                                    <td><?php echo $movie->movie->ids->slug; ?></td>
                                    <td><?php echo $movie->watchers; ?></td>
                                    <td><?php echo $movie->movie->ids->imdb; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('../Taller-web-tp3/appweb/public/TraktController/verComentarios/' . $movie->movie->ids->trakt); ?>">Ver Comentarios</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h1 >PELICULAS RECOMENDADAS</h1>
    <div class="seccion_resultados" id="seccion_resultados">
        <div class="seccion_video" id="seccion_video">
            <div id="example" class="tabla-videos">
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Año</th>
                            <th>Género</th>
                            <th>Espectadores</th>
                            <th>Codigo</th>
                            <th>Ver Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($movies as $movie) : ?>
                            <tr>
                                <td><?php echo $movie->movie->title; ?></td>
                                <td><?php echo $movie->movie->year; ?></td>
                                <td><?php echo $movie->movie->ids->slug; ?></td>
                                <td><?php echo $movie->watchers; ?></td>
                                <td><?php echo $movie->movie->ids->imdb; ?></td>
                                <td>
                                    <a href="<?php echo base_url('../Taller-web-tp3/appweb/public/TraktController/verComentarios/' . $movie->movie->ids->trakt); ?>">Ver Comentarios</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <button onclick="paggination()">Buscar Más</button>

    <h2 style="text-align: center;">Mis categorias:</h2>
    <div class="seccion_mis_categorias">
        <div class="lista_categorias" id="lista_categorias">
        </div>
    </div>

    <script src="<?php echo base_url('/assets/js/home_page_script.js'); ?>"></script>
</body>
</html>
