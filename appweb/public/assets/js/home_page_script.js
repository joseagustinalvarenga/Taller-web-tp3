
function buscarPelicula() {
  var titulo = document.getElementById("tituloPelicula").value;

  $.ajax({
      url: "http://localhost/Taller-web-tp3/appweb/public/TraktController/buscarPelicula",
      method: "POST",
      data: {titulo: titulo},
      success: function(response) {
          var tablaResultados = document.getElementById("tablaResultadosBusqueda");
          tablaResultados.innerHTML = response;
      }
  });
}


