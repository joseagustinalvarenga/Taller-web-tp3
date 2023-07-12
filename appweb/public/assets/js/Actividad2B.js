function traerDatos(){
    //Funcion que captura los datos de la tabla en el archivo prueba.html 
    //y genera una lista, con un item por cada celda, la cual luego agrega
    //al div 'listaNueva', en el archivo prueba.html.
    lista = document.getElementById("listaNueva");
    let lineaLista = ''
    let valor = $("#tabla_usuarios").find(".row_usuarios").each(function(a, b){
        for (let contenidoCelda of b.children) {
            console.log(contenidoCelda.textContent);
            lineaLista += "<li>" + contenidoCelda.textContent + "</li>";
        }
        lista.innerHTML = lineaLista;
    })
}