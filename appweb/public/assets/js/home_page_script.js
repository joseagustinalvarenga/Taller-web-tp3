
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

function guardarPelicula(traktId) {
  $.ajax({
      url: '<?php echo base_url("http://localhost/Taller-web-tp3/appweb/public/TraktController/guardarPelicula"); ?>',
      method: 'POST',
      data: { traktId: traktId },
      success: function (response) {
          console.log(response);
          // Realiza las acciones necesarias después de guardar la película
      },
      error: function (xhr, status, error) {
          console.error(error);
          // Realiza las acciones necesarias en caso de error
      }
  });
}

