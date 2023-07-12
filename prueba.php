<?php
$entrada = $_POST['user'];
    $usuario = json_decode($entrada);
    echo 'mapeo de usuario del servidor'.json_encode($usuario);
    http_response_code(200);
?>