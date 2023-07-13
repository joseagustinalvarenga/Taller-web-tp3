<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta id="base-url" name="base-url" content="<?php echo base_url(); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('Taller-web-tp3/appweb/public/assets/css/style.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('Taller-web-tp3/appweb/public/assets/css/style.css'); ?>">
        <link rel="icon" href="<?php echo base_url('/favicon.ico'); ?>">
    
        <title>Mi perfil</title>
    </head>
    <body>
        <header class="titulo_registro">
            <h1>Mis datos</h1>
        </header>
        <form id="formulario_modificacion" action="http://localhost/appweb/public/HomePage/index" method="POST">
            <div class="datos_registro">
                <section class="seccion_datos">
                    <article class="datos_formulario_registro">
                        <h2>Datos de Inicio de Sesion</h2>
                        <div class="lineas_formulario">
                            <label class="etiquetas">E-mail *</label>
                            <input type="email" name="email" class="campo_registro"  data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el email con el que registrara su cuenta" id="example" onblur="comprobrarEmailEditar()" required>
                        </div>
                    </article>
                    <article class="datos_formulario_registro">
                        <h2>Datos Personales</h2>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Nombre</label>
                            <input type="text" id="nombre_user" name="nombre_user" class="campo_registro" maxlength="60" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su(s) nombre(s)">
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Apellido</label>
                            <input type="text" id="apellido_user" name="apellido_user" class="campo_registro" maxlength="60" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su(s) apellido(s)">
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Genero</label>
                            <div>
                                <input type="radio" id="masculino" name="genero_masculino" value="Masculino" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione el genero con el que se identifica">
                                <label for="masculino" style="margin-right: 50px;">Masculino</label>
                                <input type="radio" id="femenino" name="genero_femenino" value="Femenino" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione el genero con el que se identifica">
                                <label for="femenino" style="margin-right: 20px;">Femenino</label>
                            </div>
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Numero de Teléfono</label>
                            <input type="tel" id="num_tel" name="num_tel" class="campo_registro" placeholder="(Código de área) Número" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su numero de telefono celular">
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Fecha de Nacimiento</label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="datepicker" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la su Fecha de Nacimiento, debe marcarla en el calendario">
                        </div>
                        <div class="lineas_formulario">
                            <label class="etiquetas">Página Web</label>
                            <input type="url" id="pagina_web" name="pagina_web" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su pagina web">
                        </div>
                    </article>
                    <article class="datos_formulario_registro">
                        <h2>Datos de Localización</h2>
                        <div class="lineas_formulario">
                        <label class="etiquetas">País</label>
                        <select name="pais" id="pais" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccion su Pais de residencia">
                            <option value="AR">Argentina</option>
                        </select>
                        </div>
                        <div class="lineas_formulario">
                        <label class="etiquetas">Provincia</label>
                        <select name="provincia" id="provincia" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccion su Provincia de residencia" onchange="buscarUbicacion()">
                            <option value="Misiones">Misiones</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Buenos Aires Capital">Buenos Aires Capital</option>
                            <option value="Catamarca">Catamarca</option>
                            <option value="Chaco">Chaco</option>
                            <option value="Chubut">Chubut</option>
                            <option value="Cordoba">Cordoba</option>
                            <option value="Corrientes">Corrientes</option>
                            <option value="Entre Rios">Entre Rios</option>
                            <option value="Formosa">Formosa</option>
                            <option value="Jujuy">Jujuy</option>
                            <option value="La Pampa">La Pampa</option>
                            <option value="La Rioja">La Rioja</option>
                            <option value="Mendoza">Mendoza</option>
                            <option value="Neuquen">Neuquen</option>
                            <option value="Rio Negro">Rio Negro</option>
                            <option value="Salta">Salta</option>
                            <option value="San Juan">San Juan</option>
                            <option value="San Luis">San Luis</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Santa Fe">Santa Fe</option>
                            <option value="Santiago del Estero">Santiago del Estero</option>
                            <option value="Tierra del Fuego">Tierra del Fuego</option>
                            <option value="Tucuman">Tucuman</option>
                        </select>
                        </div>
                        <div class="lineas_formulario">
                        <label class="etiquetas">Ciudad</label>
                        <select name="ciudad" id="ciudad" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione su Ciudad de residencia" onchange="buscarUbicacion()">
                            <option value="Posadas">Posadas</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Iguazu">Iguazú</option>
                        </select>
                        </div>
                        <div class="lineas_formulario">
                        <label class="etiquetas">Calle</label>
                        <input name="calle_user" id="calle" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la calle de su domicilio">
                        <!--Cada vez que se produzca un cambio sobre el input de la Calle se llamara a la funcion que permite ubicar dicha direccion en el mapa-->
                        </div>
                        <div class="lineas_formulario">
                        <label class="etiquetas">Altura (numero)</label>
                        <input name="altura_calle" id="altura" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la altura a la que se encuentra su domicilio">
                        <!--Cada vez que se produzca un cambio sobre el input de la Altura se llamara a la funcion que permite ubicar dicha direccion en el mapa-->
                        </div>
                    </article>
                    <div class="boton_registrar_cuenta">
                        <button type="submit" class="btn btn-primary" id="btn-Crear-Cuenta" >Guardar Cambios</button> <!--Boton predeterminado de Bootstrap-->
                    </div>
                </section>
                <section>
                    <div class="div_banner">
                    <img src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/img/welcome_videotrend.png'); ?>" id="imagen_banner" onclick="cambiarImagen()">                
                        <p>Al hacer clic en "Guardar cambios",<br> aceptas las Condiciones<br> y confirmas que leiste nuestra<br> Politica de datos, incluido el uso<br> de cookies.</p>
                    </div>
                </section>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public//assets/js/jquery-3.6.0.js'); ?>"></script> 
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public//assets/js/Actividad3A.js'); ?>"></script>
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public//assets/js/registro.js'); ?>"></script>
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/js/modificar_perfil.js'); ?>"></script>
    </body>
</html>