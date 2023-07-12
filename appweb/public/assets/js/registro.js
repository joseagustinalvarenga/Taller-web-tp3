function comprobrarEmail(){
    email =document.getElementById("example").value
    $.ajax({
        // En data puedes utilizar un objeto JSON, un array o un query string
        data: {email: JSON.stringify(email)},
        //Cambiar a type: POST si necesario
        type: "POST",
        dataType: "json",
        // URL a la que se enviará la solicitud Ajax
        url: "verificaremail",

        success: function(datos){
            if(datos.bandera==1){
                document.getElementById("imagen_email_valido").innerHTML='<img id="imagen-email-valido"src="http://localhost/appweb/public/assets/img/tickverde.png" height="18"/>'
                document.getElementById("btn-Crear-Cuenta").style.display = ''
            }else{
                document.getElementById("btn-Crear-Cuenta").style.display = 'none'
                if(document.getElementById("imagen-email-valido")){
                    document.getElementById("imagen-email-valido").style.display = 'none'
                }
                alert("El email pertenece a un Usuario existente")
            }
            
        }
    })
}

