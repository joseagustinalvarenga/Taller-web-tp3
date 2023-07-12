<?php
    echo "Datos ingresados desde localhost:";
    print_r($users);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 2)c</title>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="../js/Actividad2_B.js"></script>
    </head>
    <body>
        <ol title="Ejercicio 2) c)">
            <li><a href="intro.html" target="_blank">Utilizacion del target "blank"</a></li>
            <li><a href="intro.html" target="_self">Utilizacion del target "self"</a></li>
            <li><a href="intro.html" target="_parent">Utilizacion del target "parent"</a></li>
            <li><a href="intro.html" target="_top">Utilizacion del target "top"</a></li>
            </ol>
    </body>

    <div>
        <img src="https://www.pngkey.com/png/detail/14-148130_minion-imagenes-de-100x100-pixeles.png" alt="Minion, Gru, Mi villano favorito" width=100px/>
        <img src="https://image.shutterstock.com/image-vector/pixel-art-crab-600w-1362094601.jpg" alt="pixel art crab" width=100px/>
    </div>

    <table border:1px id="tabla_usuarios">
        <caption>Usuarios</caption>
        <tr class="row_usuarios">
            <th>ID</th>
            <th>email</th>
            <th>Contrasenia</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha_nacimiento</th>
            <th>GeneroFM</th>
            <th>Telefono</th>
        </tr>
        <?php
            foreach($users as $key => $values){
                ?>
                <tr>
                    <td><?php echo $users[$key]['ID']; ?></td>
                    <td><?php echo $users[$key]['usuario']; ?></td>
                    <td><?php echo $users[$key]['pass']; ?></td>
                    <td><?php echo $users[$key]['nombre']; ?></td>
                </tr>
            <?php
            }
        ?>
    </table>
    <button onclick="traerDatos()">Hola</button>
    <hr>
    <ul id="listaNueva"></ul>
</html>