function agregar() {
    //Concatena los elementos ingresados en el primer input al ir presionando el boton 'Agregar'
    //Y reincia el input.
    let valor = document.getElementById("valor");
    let delimitador = document.getElementById("delimitador");
    let aux;
    aux = concat(valor.value, delimitador.value);

    str_concat = concat(str_concat, aux);
    console.log(str_concat);
    document.getElementById("valor").value = '';
}

function finalizar(){
    //Divide el string generado anteriormente en un array
    //dividido por el delimitador ingresado, y genera una
    //lista de cada uno de los elementos del string que luego
    //es insertada en 'Actividad1C.html'
    let delimitador = document.getElementById("delimitador");
    let listaDePalabras;
    listaDePalabras = str_concat.split(delimitador.value);
    listaDePalabras.splice((listaDePalabras.length-1),1);
    console.log(listaDePalabras);

    let stringLista;

    stringLista = "<ul>";
    for(let a=0; a<listaDePalabras.length; a++){
        stringLista = stringLista + "<li>" + listaDePalabras[a] + "</li>";
    }
    stringLista = stringLista + "</ul>";
    listaHTML = document.getElementById("lista")
    listaHTML.innerHTML = stringLista; 

}