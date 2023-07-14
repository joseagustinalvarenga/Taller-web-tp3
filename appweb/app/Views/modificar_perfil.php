<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta id="base-url" name="base-url" content="<?php echo base_url(); ?>">
        <link rel="stylesheet" type="text/css" href="http://localhost/Taller-web-tp3/appweb/public/assets/css/style-crear_cuenta.css ">
        <link rel="icon" href="<?php echo base_url('Taller-web-tp3/appweb/public/favicon.ico'); ?>">
    
        <title>Mi perfil</title>
    </head>
    <body>
        <header class="header">
            <h1>MODIFICAR MIS DATOS</h1>
        </header>
        <aside class="aside">
			<div class="bannerDerecho">
                <p><img src="http://localhost/Taller-web-tp3/appweb/public/assets/img/welcome_videotrend.png" alt="welcome videotrend" width="60%"></p>
				<p>Al hacer click en "Guardar Cambios", acepta las Condiciones y confirmas que leíste nuestra Política de datos, incluído el uso de cookies.</p>
			</div>
		</aside>
        <form id="formulario_modificacion" action="update" method="POST">
            <div class="datos_registro">
            <h3>Datos de Inicio de Sesión</h3>
                <div>
                  <label>E-mail*</label>
                  <input type="email" name="email" class="campo_registro" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el email con el que registrara su cuenta" id="example" onblur="obtenerDatosUsuario()" required>
                </div>
                <div>
                  <label>Contraseña*</label>
                  <input type="password" name="password" required   title="Ingrese Contraseña">
                </div>
            
                <h3>Datos de Localización</h3>
                <div>
                    <label class="etiquetas">Pais</label>
                    <select name="pais" id="pais"class="desplegable" data-placement="top" title="Seleccione su pais">
                        <option value="" selected disabled hidden>Seleccione un país</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Perú</option>
                        <option value="Surinam">Surinam</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>
                      </select>                      
                    </div>
                    <div>
                    <label class="etiquetas">Provincia/Estado</label>
                    <select name="provincia" id="provincia"class="desplegable" data-placement="top" title="Seleccione su provincia">
                        <option value="" selected disabled hidden>Seleccione una provincia</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Catamarca">Catamarca</option>
                        <option value="Chaco">Chaco</option>
                        <option value="Chubut">Chubut</option>
                        <option value="Ciudad Autónoma de Buenos Aires">Ciudad Autónoma de Buenos Aires</option>
                        <option value="Córdoba">Córdoba</option>
                        <option value="Corrientes">Corrientes</option>
                        <option value="Entre Ríos">Entre Ríos</option>
                        <option value="Formosa">Formosa</option>
                        <option value="Jujuy">Jujuy</option>
                        <option value="La Pampa">La Pampa</option>
                        <option value="La Rioja">La Rioja</option>
                        <option value="Mendoza">Mendoza</option>
                        <option value="Misiones">Misiones</option>
                        <option value="Neuquén">Neuquén</option>
                        <option value="Río Negro">Río Negro</option>
                        <option value="Salta">Salta</option>
                        <option value="San Juan">San Juan</option>
                        <option value="San Luis">San Luis</option>
                        <option value="Santa Cruz">Santa Cruz</option>
                        <option value="Santa Fe">Santa Fe</option>
                        <option value="Santiago del Estero">Santiago del Estero</option>
                        <option value="Tierra del Fuego">Tierra del Fuego</option>
                        <option value="Tucumán">Tucumán</option>
                      </select>
                    </div>
                    <div>
                    <label class="etiquetas">Ciudad</label>
                    <select name="ciudades" id="ciudades"class="desplegable" data-placement="top" title="Seleccione su ciudad">
                        <option value="">Selecciona una ciudad</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Córdoba">Córdoba</option>
                        <option value="Rosario">Rosario</option>
                        <option value="Mendoza">Mendoza</option>
                        <option value="La Plata">La Plata</option>
                        <option value="Tucumán">Tucumán</option>
                        <option value="Mar del Plata">Mar del Plata</option>
                        <option value="Salta">Salta</option>
                        <option value="Posadas">Posadas</option>
                      </select>
                    </div>

			<h3>Datos Personales</h3>
            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" id="nombre" maxlength="60"   title="Ingrese su nombre">
            </div>
            <div>
                <label>Apellido</label>
                <input type="text" name="apellido" id="apellido"maxlength="60"  title="Ingrese apellido">
            </div>
            <div>
                <label>Dirección</label>
                <input type="text" name="direc"id="direc" maxlength="100"  title="Ingrese su direccion">
            </div>
            <div>
                <label>Género</label>
                    <input type="radio" id="masculino" value="masculino" name="genero_masculino" style="width: auto;"   title="Ingrese genero">
                    <label for="masculino" style="margin-left: 0px;">Masculino</label>
                    <input type="radio" id="femenino" value="femenino" name="genero_femenino" style="width: auto;"   title="Ingrese genero">
                    <label for="femenino" style="margin-left: 0px;">Femenino</label>
            </div>
            <div>
                <label>Número de Telefono</label>
                <input type="tel" name="num_tel" id="num_tel"placeholder="Código de área + telefono"   title="Ingrese telefono">
            </div>
            <div>
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"  title="Ingrese fecha de nacimiento">
            </div>
			
            <h3>Datos Particulares</h3>
                <div>
                    <label for="color-ojos">Color de ojos</label>
                    <input type="color" id="color-ojos" name="color-ojos"   title="Ingrese su color de ojos">
                </div>
                <div>
                    <label for="estatura">Estatura </label>
                    <input name="estatura_ent" type="number" id="estatura_ent" min="0" max="2" step="1" style="width: 40px;" title="Ingrese su estatura">
                    <span> , </span>
                    <input type="number" id="estatura_dec" min="00" max="99" step="01" style="width: 40px;">
                    <span> Metros </span>
                </div>
                <div>
                    <label for="pagina">Página Web</label>
			        <input type="url" name="pagina"  id="pagina"    title="Ingrese su pagina web">
                </div>
                <input type="submit" value="Guardar Cambios" class="boton-submit">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public//assets/js/jquery-3.6.0.js'); ?>"></script> 
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public//assets/js/Actividad3A.js'); ?>"></script>
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public//assets/js/registro.js'); ?>"></script>
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/js/modificar_perfil.js'); ?>"></script>
    </body>
</html>


<script>
    function obtenerDatosUsuario() {
        var email = document.getElementById('example').value;

        // Realizar solicitud AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/Taller-web-tp3/appweb/public/User/obtenerDatosUsuario', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log(response);
                console.log(response.nombre);
                console.log("Valor de genero:", response.genero);

                if (response.username) {
                    document.getElementById('nombre').value = response.nombre;
                    document.getElementById('apellido').value = response.apellido;
                    document.getElementById('direc').value = response.direccion;
                    document.getElementById('ciudades').value = response.ciudad;
                    document.getElementById('color-ojos').value = response.colorOjos;
                    //document.getElementById('').value = response.estatura;
                    document.getElementById('fecha_nacimiento').value = response.fechanacimiento;
                    if (parseInt(response.genero) === 1) {
                        console.log("pipe");
                        document.getElementById('masculino').checked = true;
                    } else if (parseInt(response.genero) === 2) {
                        document.getElementById('femenino').checked = true;
                    }                  
                    document.getElementById('num_tel').value = response.numtel;
                    document.getElementById('pagina').value = response.pagweb;
                    document.getElementById('pais').value = response.pais;
                    document.getElementById('provincia').value = response.provincia;

                    console.log('Datos de usuario obtenidos exitosamente');
                } else {
                    console.log('No se encontraron datos de usuario');
                }

            }
        };
        xhr.send('email=' + email);
    }
</script>
