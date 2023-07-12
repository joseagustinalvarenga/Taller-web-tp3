function Usuario(email, contrasenia){
    this.email = email.value;
    this.contrasenia = contrasenia.value;
    this.alertaMensaje = alert('EMAIL: ' + this.email + '  CONTRASEÑA: ' + this.contrasenia);
}

function mostrar_Mensaje(email, contrasenia){
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