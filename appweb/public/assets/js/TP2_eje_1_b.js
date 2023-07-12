function agregar() {

    let valor = document.getElementById("valor");
    let delimitador = document.getElementById("delimitador");
    let aux;
    aux = concat(valor.value, delimitador.value);
    str_concat = concat(str_concat, aux);
    console.log(str_concat);
    document.getElementById("valor").value = '';
}

function finalizar(){
    let delimitador = document.getElementById("delimitador");
    let lista;
    lista = str_concat.split(delimitador.value);
    lista.splice((lista.length-1),1);

    let stringLista;

    stringLista = "<ul>";
    for(let a=0; a<lista.length; a++){
        stringLista = stringLista + "<li>" + lista[a] + "</li>";
    }
    stringLista = stringLista + "</ul>";
    listaHTML = document.getElementById("lista")
    listaHTML.innerHTML = stringLista; 

}