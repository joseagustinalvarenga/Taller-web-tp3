function Usuario(email, contrasenia){
    this.email = email.value;
    this.contrasenia = contrasenia.value;
    this.alertaMensaje = alert('e-mail: ' + this.email + '   | contraseña: ' + this.contrasenia);
}

function mostrar_Mensaje(email, contrasenia){
    let usuario = new Usuario(email,contrasenia);
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


function cambiarImagen(){
    //Funcion que permite cambiar la imagen del banner al hacer click
    //sobre la misma, con un efecto de Slide.
    let sourceImagen = $("#imagen_banner").attr("src");
    console.log(sourceImagen);
    if($("#imagen_banner").attr("src") == "/img/banner_sin_dimension.png"){
        $("#imagen_banner").slideToggle( function(){
            $("#imagen_banner").attr("src","/img/tierra.png").slideToggle();
            }
        )
        
    }

    if($("#imagen_banner").attr("src") == "/img/tierra.png"){
        $("#imagen_banner").slideToggle( function(){
            $("#imagen_banner").attr("src","/img/computadora.png").slideToggle();
            }
        )
        
    }

    if($("#imagen_banner").attr("src") == "/img/computadora.png"){
        $("#imagen_banner").slideToggle( function(){
            $("#imagen_banner").attr("src","/img/banner_sin_dimension.png").slideToggle();
            }
        )
        
    }

}