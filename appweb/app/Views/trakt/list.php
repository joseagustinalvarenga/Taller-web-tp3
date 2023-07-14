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
    <link rel="icon" href="<?php echo base_url('Taller-web-tp3/appweb/public/favicon.ico'); ?>">
    <title>Video Trend - Home Page</title>
</head>
<body>
    <header class="barra_superior_home_page">
        <div class="imagen_header">
            <a href="<?php echo base_url('User/mostrar_login'); ?>" id="link_imagen">
                <img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/logo.png'); ?>" id="imagen_boton_play"></a>
        </div>
        <div class="titulo">
            <a href="<?php echo base_url('User/mostrar_login'); ?>" id="link_titulo"><h1>Video Trend</h1></a>
        </div>
        <div class="usuario_home_page" id="seccion_cabecera_usuario">
            <a href="<?php echo base_url('../Taller-web-tp3/appweb/public/User/mostrar_perfil'); ?>">
                <img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/confi.png'); ?>" width="50px" class="imagen_usuario">
                Modificar perfil
            </a>
        </div>
    </header>

    <div class="campos_busqueda">
        <form action="<?php echo base_url('../Taller-web-tp3/appweb/public/TraktController/buscarPelicula/'.$usuarioId); ?>" method="post">
            <input type="text" id="tituloPelicula" placeholder="Título de la película" name="titulo">
            <input type="text" id="categoriaPelicula" placeholder="Categoría de la película" name="categoria">
            <button type="submit">Buscar</button>
        </form>
    </div>

   
    <h1>RESULTADOS DE LA BÚSQUEDA</h1>
<div class="seccion_resultados_busqueda" id="seccion_resultados_busqueda">
    <div class="seccion_video" id="seccion_video_busqueda">
        <div id="example_busqueda" class="tabla-videos">
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Año</th>
                        <th>Descripción</th>
                        <th>Espectadores</th>
                        <th>Ver Comentarios</th>
                        <th>Guardar</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($results)) : ?>
                    <?php foreach ($results as $result) : ?>
                        <tr>
                            <td><?php echo $result->movie->title; ?></td>
                            <td><?php echo $result->movie->year; ?></td>
                            <td><?php echo $result->movie->overview; ?></td>
                            <td><?php echo $result->movie->ids->trakt; ?></td>
                            <td>
                                <a href="<?php echo base_url('../Taller-web-tp3/appweb/public/TraktController/verComentarios/' . $result->movie->ids->trakt); ?>">Ver Comentarios</a>
                            </td>
                            <td>
                                <form action="<?php echo base_url('../Taller-web-tp3/appweb/public/TraktController/guardarPelicula/'.$usuarioId); ?>" method="post">
                                    
                                    <input type="hidden" name="peliculaId" value="<?php echo $result->movie->ids->trakt; ?>">
                                    <input type="hidden" name="titulo" value="<?php echo $result->movie->title; ?>">
                                    <input type="hidden" name="anio" value="<?php echo $result->movie->year; ?>">
                                    <input type="hidden" name="descripcion" value="<?php echo $result->movie->overview; ?>">
                                    <input type="hidden" name="espectadores" value="<?php echo $result->movie->ids->trakt; ?>">
                                    <button type="submit">Guardar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">No se encontraron resultados.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<h1>PELÍCULAS RECOMENDADAS</h1>
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
                        <th>Código</th>
                        <th>Ver Comentarios</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($recommendations)) : ?>
                    <?php foreach ($recommendations as $recommendation) : ?>
                        <tr>
                            <td><?php echo $recommendation->movie->title; ?></td>
                            <td><?php echo $recommendation->movie->year; ?></td>
                            <td><?php echo $recommendation->movie->ids->slug; ?></td>
                            <td><?php echo $recommendation->watchers; ?></td>
                            <td><?php echo $recommendation->movie->ids->imdb; ?></td>
                            <td>
                                <a href="<?php echo base_url('../Taller-web-tp3/appweb/public/TraktController/verComentarios/' . $recommendation->movie->ids->trakt); ?>">Ver Comentarios</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">No hay películas recomendadas.</td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

    

    <h2 style="text-align: center;">Mi biblioteca:</h2>
    <div class="seccion_biblioteca">
        <a href="<?php echo base_url('../Taller-web-tp3/appweb/public/TraktController/mostrarBiblioteca/'.$usuarioId); ?>" class="boton-mi-biblioteca">Ver mis videos guardados</a>
        <br></br>
        <br></br>
        <br></br>
    </div>

    <script src="<?php echo base_url('../Taller-web-tp3/appweb/public/assets/js/home_page_script.js'); ?>"></script>
</body>
</html>
