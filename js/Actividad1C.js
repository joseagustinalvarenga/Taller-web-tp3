function valid_user(str_nom){
    //Funcion que valida la correcta formulacion del nombre de usuario
    let reglas = /[a-zA-Z]{6,}[0-9]{2,}$/

    if(reglas.test(str_nom.value)){
        resultado = document.getElementById("resultado")
        resultado.innerHTML = '<span style="color:green">Nombre de Usuario Valido</span>'
        console.log("true")
    }else{
        resultado = document.getElementById("resultado")
        resultado.innerHTML = '<span style="color:red">Nombre de Usuario NO Valido</span>'
        console.log("false")
    }

}