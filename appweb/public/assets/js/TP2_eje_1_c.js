
function valid_user(str_nom){
    let reglas = /[a-zA-Z]{6,}[0-9]{2,}$/

    if(reglas.test(str_nom.value)){
        resultado = document.getElementById("resultado")
        resultado.innerHTML = '<span style="color:green">Nombre de Usuario Valido</span>'
        console.log("true")
    }else{
        resultado = document.getElementById("resultado")
        resultado.innerHTML = '<span style="color:red">Nombre de Usuario NO Valido</span><br>Ingrese un nombre de usuario compuesto por al menos 6 letras seguidas de al menos 2 dígitos.'
        console.log("false")
    }

}