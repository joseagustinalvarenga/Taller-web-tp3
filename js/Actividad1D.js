function Usuario(email, contrasenia){
    this.email = email.value;
    this.contrasenia = contrasenia.value;
    this.alertaMensaje = alert('e-mail: ' + this.email + '   | contraseña: ' + this.contrasenia);
}

function mostrar_Mensaje(email, contrasenia){
    //Funcion que genera la alerta en el archivo index.html.
    let usuario = new Usuario(email,contrasenia);
    usuario.alertaMensaje
    $.ajax({
        url:'prueba.php',
        method:'POST',
        data:{
            user:JSON.stringify(usuario)
        },
    }).done((resp)=>{
        alert("Respuesta de servidor: " + resp);
    }).fail((err)=>{
        console.error(" Ocurrio un error " + err)
    })
}