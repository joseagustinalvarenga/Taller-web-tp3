let str_concat = '';
function concat_replace() {
    //Funcion que concatena las strings ingresados en los dos primeros input
    //y reemplaza en caso de encontralo, el string ingresado en el tercer input
    //por el string ingresado en el ultimo.
    let str_ini = document.getElementById("str_ini");
    let str_fin = document.getElementById("str_fin");
    let str_needle = document.getElementById("str_needle");
    let str_to = document.getElementById("str_to");

    console.log([str_ini.value, str_fin.value, str_needle.value, str_to.value]);
    str_concat = concat(str_ini.value, str_fin.value);
    console.log(str_concat);
    if (str_needle && str_to) {
        for( var i = 0; i < str_concat.length;i++){
            str_concat= str_concat.replace(str_needle.value,str_to.value);
        }
    }
    console.log(str_concat);
    document.getElementById("resultado").value = str_concat;
}

let concat = (a, b) => a + b;