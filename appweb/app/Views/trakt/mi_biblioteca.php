<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mi Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .acordeon {
            margin-top: 20px;
        }

        .item {
            background-color: #f5f5f5;
            margin-bottom: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .item h3 {
            font-size: 16px;
            margin: 0;
            padding: 10px;
            background-color: #ddd;
            border-radius: 5px 5px 0 0;
            color: #333;
            cursor: pointer;
        }

        .contenido {
            display: none;
            padding: 10px;
            background-color: #fff;
            border-radius: 0 0 5px 5px;
            color: #555;
        }

        .contenido p {
            margin: 5px 0;
        }
        .titulo {
            font-size: 1.5em;
            margin-right: 30px;
            margin-bottom: 0px;
            color: white;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('Taller-web-tp3/appweb/public/assets/css/stilo.css'); ?>">
</head>
<header class="barra_superior_home_page">
        <div class="imagen_header">
                <img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/logo.png'); ?>" id="imagen_boton_play"></a>
        </div>
        <div class="titulo">
            <h2>Video Trend</h2>
        </div>
        <div class="usuario_home_page" id="seccion_cabecera_usuario">
            <a href="<?php echo base_url('../Taller-web-tp3/appweb/public/User/mostrar_perfil'); ?>">
                <img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/confi.png'); ?>" width="50px" class="imagen_usuario">
                Modificar perfil
            </a>
        </div>
    </header>
<body>
    <h1>Mi Biblioteca</h1>

    <?php if (empty($videosGuardados)) : ?>
        <p>No hay películas guardadas en tu biblioteca.</p>
    <?php else : ?>
        <div class="acordeon">
            <?php foreach ($videosGuardados as $video) : ?>
                <div class="item">
                    <h3><?php echo $video['titulo']; ?></h3>
                    <div class="contenido">
                        <p><strong>Año:</strong> <?php echo $video['anio']; ?></p>
                        <p><strong>Descripción:</strong> <?php echo $video['descripcion']; ?></p>
                        <p><strong>Espectadores:</strong> <?php echo $video['espectadores']; ?></p>
                        <p><strong>Guardado el:</strong> <?php echo $video['created_at']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <script>
        const items = document.querySelectorAll('.item');

        items.forEach(item => {
            item.addEventListener('click', () => {
                item.classList.toggle('active');
                const contenido = item.querySelector('.contenido');
                contenido.style.display = contenido.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
