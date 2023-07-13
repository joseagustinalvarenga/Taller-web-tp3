var UserEmail = localStorage.UserEmail                                                                                        

function obtener_datos(){
    console.log("genio");
    $.ajax({
        data: {'email': UserEmail},
        type: "POST",
        dataType: "json",
        // URL a la que se enviará la solicitud Ajax
        url: "../../app/Controllers/User.php/obtener_datos_usuario",
        success : function(obtener_datos_usuario){
            console.log(obtener_datos_usuario)
            document.getElementById('nombre_user').value = datos_usuario.nombre
            document.getElementById("altura").value = datos_usuario.altura
            document.getElementById("apellido_user").value = datos_usuario.apellido
            document.getElementById("calle").value = datos_usuario.calle
            document.getElementById("ciudad").value = datos_usuario.ciudad
            document.getElementById("example").value = datos_usuario.email
            document.getElementById("fecha_nacimiento").value = datos_usuario.fechanacimiento
            if(datos_usuario.genero==1){
                document.getElementById('masculino').checked = true
            }else{
                document.getElementById('femenino').checked = true
            }
            document.getElementById("num_tel").value = datos_usuario.numtel
            document.getElementById("pagina_web").value = datos_usuario.pagweb
            document.getElementById("pais").value = datos_usuario.pais
            document.getElementById("provincia").value = datos_usuario.provincia
            localStorage.UserId = datos_usuario.id;
        },
        error : function(b){
            console.log(b)
        }
      })
}

function comprobrarEmailEditar(){
    console.log("capo");
    if(document.getElementById("example").value != UserEmail){
        console.log(document.getElementById("example").value);
        obtener_datos()
    }
}


window.addEventListener("load", function() {
    document.getElementById('formulario_modificacion').addEventListener("submit", function(e) {
        /* do what you want with the form */
        var idUsuario = localStorage.UserId
        if( document.getElementById('masculino').checked){
            genero_usuario=1
        }else if(document.getElementById('femenino').checked){
            genero_usuario=2
        }
        $.ajax({
            data: {'nombre': document.getElementById('nombre_user').value,
            'altura': document.getElementById("altura").value,
            'apellido': document.getElementById("apellido_user").value,
            'calle': document.getElementById("calle").value,
            'ciudad': document.getElementById("ciudad").value,
            'email': document.getElementById("example").value,
            'fechanacimiento': document.getElementById("fecha_nacimiento").value,
            'genero': genero_usuario,
            'id': idUsuario,
            'numtel': document.getElementById("num_tel").value,
            'pagweb': document.getElementById("pagina_web").value,
            'pais': document.getElementById("pais").value,
            'provincia': document.getElementById("provincia").value,
            },
            type: "POST",
            // URL a la que se enviará la solicitud Ajax
            url: "http://localhost/appweb/public/User/modificar_datos_usuario"
        })
        // Should be triggered on form submit
    })
});
