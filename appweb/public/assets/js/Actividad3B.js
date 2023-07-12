//Inicializacion del mapa.
var map = L.map('map').setView([-27.36708, -55.89608], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {

  maxZoom: 18,
  id: 'mapbox/streets-v11',
  tileSize: 512,
  zoomOffset: -1,
  accessToken: 'pk.eyJ1IjoiYWd1c2NhciIsImEiOiJjbDJsZW55dmUwY3hxM2NxaHBianZ4a3h4In0.YSXjC_KHv43XaeT_GlS1-A'
}).addTo(map);

//Agregamos GeoSearchControl a la instancia del mapa.
const search = new GeoSearch.GeoSearchControl({
  provider: new GeoSearch.OpenStreetMapProvider(),
});


const buscar = async function () {
  //Funcion que captura los datos del Pais, Provincia, Ciudad, Calle y Altura
  //para generar un string a partir del cual se buscara la direccion ingresada
  //en el mapa.
  var result = null;
  const provider = new GeoSearch.OpenStreetMapProvider();
  var search = document.getElementById('calle').value;
  if (document.getElementById('altura').value) {
    search += ' ' + document.getElementById('altura').value;
  }

  search += ', ' + document.getElementById('ciudad').value;
  search += ', ' + document.getElementById('provincia').value;
  search += ', ' + document.getElementById('pais').value;

  result = await provider.search({ query: search });
  console.log(result);

  if (result != null && result.length > 0) {
    if (this.marker) {
      this.marker.remove();
    }
    var zoom = 17;
    this.map.setView([result[0].y, result[0].x], zoom);
    this.marker = L.marker([result[0].y, result[0].x], { title: result[0].label }).addTo(map);
    document.getElementById('lat').value = result[0].y;
    document.getElementById('long').value = result[0].x;
  }
}

function buscarUbicacion() {
  //Funcion para iniciar la busqueda de la direccion en el mapa.
  buscar();
}

