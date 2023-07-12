<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Home Page de la Guia de Actividades 3 de Taller de Aplicaciones Web">
        <meta name="keywords" content="CodeIgniter, Guia de Actividades">
        <meta name="author" content="Tomas Cardozo, Martin Ojeda">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://apis.google.com/js/api.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('Taller-web-tp3/appweb/public/assets/css/home_page.css'); ?>">
        <link rel="icon" href="<?php echo base_url('/favicon.ico'); ?>">
        <title>Video Trend - Home Page</title>
    </head>
    <body>
        <header class="barra_superior_home_page">
            <h1 class="titulo_home_page">VideoTrend</h1>
            <div class="usuario_home_page" id="seccion_cabecera_usuario">
                <img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/usuario2.png'); ?>" width="20px" class="imagen_usuario">
            </div>
        </header>
        <div class="campos_busqueda">
            <div class="lineas_formulario">
                <label style="text-align: left;">Titulo</label>
                <div>
                    <input name="titulo_cateogria" id="titulo_categoria">
                    <button onclick="agregar_categoria()">Agregar</button>
                </div>
            </div>
            <div class="lineas_formulario">
                <label style="text-align: left;">Terminos de búsqueda</label>
                <div>
                    <input id="query" name="terminos_busqueda">
                    <button onclick="search()" id="button_buscar">Buscar</button>
                </div>
            </div>
            <div class="lineas_formulario">
                <label style="text-align: left;">Filtros</label>
                <select id="filtros">
                    <option value="none">Seleccione un filtro</option>
                    <option value="relevance">Relevancia</option>
                    <option value="date">Fecha de Subida</option>
                    <option value="viewCount">Numero de Visualizaciones</option>
                    <option value="rating">Puntuación</option>
                </select>
            </div>
        </div>
        <div class="seccion_resultados" id="seccion_resultados">
            <div class="seccion_video" id="seccion_video">
                <div id="example" class="tabla-videos"></div>
            </div>
            <button onclick="paggination()">Buscar Más</button>
        </div>
        <h2 style="text-align: center;">Mis categorias:</h2>
        <div class="seccion_mis_categorias">
            <div class="lista_categorias" id="lista_categorias">
            </div>
        </div>
        <script src="<?php echo base_url('/assets/js/home_page_script.js'); ?>"></script>
    </body>
</html>
