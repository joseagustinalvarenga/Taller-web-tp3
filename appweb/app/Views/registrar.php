<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="http://localhost/Taller-web-tp3/appweb/public/assets/css/style-crear_cuenta.css ">
        <link rel="icon" href="<?php echo base_url('http://localhost/Taller-web-tp3/appweb/public/favicon.ico'); ?>">
        <title>Registro de Usuarios</title>
    </head>
    <body>
        <header class="header">
            <h1>Registro de Usuarios</h1>
        </header>
        <nav class="nav">
            <ul>
                <a href="http://localhost/Taller-web-tp3/appweb/public/User/mostrar_login" class="link_menu"><li class="menu_superior">Iniciar Sesion</a>
            </ul>
        </nav>
        <aside class="aside">
			<div class="bannerDerecho">
                <p><img src="http://localhost/Taller-web-tp3/appweb/public/assets/img/welcome_videotrend.png" alt="welcome videotrend" width="60%"></p>
				<p>Al hacer click en "Crear mi Cuenta", acepta las Condiciones y confirmas que leíste nuestra Política de datos, incluído el uso de cookies.</p>
			</div>
		</aside>
        <form action="insert" method="post">
            <div class="datos_registro">
            <h3>Datos de Inicio de Sesión</h3>
                <div>
                    <label>Nombre de usuario*</label>
                    <input type="text" name="username" maxlength="20"  title="Ingrese nombre de usuario" required>
                </div>
                <div>
                  <label>E-mail*</label>
                  <input type="email" name="email"   title="Ingrese su e-mail." required>
                </div>
                <div>
                  <label>Contraseña*</label>
                  <input type="password" name="password" required   title="Ingrese Contraseña">
                </div>
                <div>
                  <label>Repetir Contraseña*</label>
                  <input type="password" name="password" required   title="Ingrese Contraseña">
                </div>
            
                <h3>Datos de Localización</h3>
                <div>
                    <label class="etiquetas">Pais</label>
                    <select name="pais" class="desplegable" data-placement="top" title="Seleccione su pais">
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
                    <select name="provincia" class="desplegable" data-placement="top" title="Seleccione su provincia">
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
                    <select name="ciudades" class="desplegable" data-placement="top" title="Seleccione su ciudad">
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
                <input type="text" name="nombre" maxlength="60"   title="Ingrese su nombre">
            </div>
            <div>
                <label>Apellido</label>
                <input type="text" name="apellido" maxlength="60"  title="Ingrese apellido">
            </div>
            <div>
                <label>Dirección</label>
                <input type="text" name="direc" maxlength="100"  title="Ingrese su direccion">
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
                <input type="tel" name="num_tel" placeholder="Código de área + telefono"   title="Ingrese telefono">
            </div>
            <div>
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento"   title="Ingrese fecha de nacimiento">
            </div>
			
            <h3>Datos Particulares</h3>
                <div>
                    <label for="color-ojos">Color de ojos</label>
                    <input type="color" id="color-ojos" name="color-ojos"   title="Ingrese su color de ojos">
                </div>
                <div>
                    <div>
                        <label for="estatura">Estatura </label>
                        <input name="estatura" type="number" id="estatura_ent" min="0" max="2" step="1"style="width: 40px;"   title="Ingrese su estatura">
                        <span> , </span>
                        <input type="number" id="estatura_dec" min="00" max="99" step="01"style="width: 40px;">
                        <span> Metros </span>
                    </div>
                </div>
                <div>
                    <label for="pagina">Página Web</label>
			        <input type="url" name="pagina"   title="Ingrese su pagina web">
                </div>
                <div>
                    <label for="video-perfil">Mi video de perfil</label>
                    <input type="file" id="video-perfil" name="video-perfil" accept="video/mp4"   title="Ingrese un video">
                </div>
                <div>
                    <label for="audio-perfil">Mi audio de perfil</label>
                    <input type="file" id="audio-perfil" name="audio-perfil" accept="audio/mpeg"   title="Ingrese un audio">
                </div>

			<br><br>
			<input type="submit" value="Crear Cuenta" class="boton-submit">
		</form>
            </div>
        </form>
        <footer class="footer">
            <p><a href="https://www.google.com/" target="_blank">Trakt API</a></p>
            <p><a href="https://www.ugd.edu.ar/" target="_blank">U.G.D.</a></p>
            <p><a href="https://campusvirtual.ugd.edu.ar/moodle/login/index.php" target="_blank">Campus Virtual</a></p>
	    </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
        <script src="<?php echo base_url('Taller-web-tp3/appweb/public/assets/css/style-crear_cuenta.css'); ?>"></script>
    </body>
</html>