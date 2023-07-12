var acc = document.getElementsByClassName("accordion");
var i;
var UserEmail = localStorage.UserEmail;
var q
console.log(UserEmail)
mostrar_nombre_usuario()
mostrar_categorias()
var listaCategoriasUsuario = []
var tokenSiguientePagina


function start() {
    // Initializes the client with the API key and the Translate API.
    gapi.client.init({
      'apiKey': 'AIzaSyBAv9cfm-Id9fskUkJnc1_L38FKAkJ7Qno',
      'discoveryDocs': ['https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest'],
    }).then(function () {
      console.log("GAPI client loaded for API");
      },
      function (err) {
          console.error("Error loading GAPI client for API", err);
      })
};
  // Loads the JavaScript client library and invokes `start` afterwards.
  gapi.load('client', start);
  
function paggination(){
  console.log($('#filtros').val())
  if($('#filtros').val()=='none'){
    var requestMore = gapi.client.youtube.search.list({
    q: q,
    part: 'snippet',
    maxResults: 40,
    pageToken: tokenSiguientePagina
    });
  }else{
    var requestMore = gapi.client.youtube.search.list({
      q: q,
      part: 'snippet',
      maxResults: 40,
      pageToken: tokenSiguientePagina,
      order: $('#filtros').val()
      });
  }
    requestMore.execute(function(response) {
      console.log(response)
      var playlistItems = response.result.items;
      if (playlistItems) {
        $.each(playlistItems, function(index, item) {
          displayResult(item);
        });
      } else {
        $('#example').html('Sorry you have no uploaded videos');
      }
    });
}


// Search for a specified string.
function search() {
  q = $('#query').val();
  if($('#filtros').val()=='none'){
    var request = gapi.client.youtube.search.list({
      q: q,
      part: 'snippet',
      maxResults: 40
    });
  }else{
    var request = gapi.client.youtube.search.list({
      q: q,
      part: 'snippet',
      maxResults: 40,
      order: $('#filtros').val()
    });
  }
  request.execute(function(response) {
    console.log(response)
    tokenSiguientePagina = response.nextPageToken;
    var playlistItems = response.result.items;
    if (playlistItems) {
      $.each(playlistItems, function(index, item) {
        displayResult(item);
      });
    } else {
      $('#example').html('Sorry you have no uploaded videos');
    }
  });
}

function agregar_categoria(){
  var titulo_categoria = $('#titulo_categoria').val();
  console.log($('#titulo_categoria').val())
  if(($('#' + titulo_categoria).val())==""){
    alert('La categoria ya existe');
  }else{
    $.ajax({
      // En data puedes utilizar un objeto JSON, un array o un query string
      data: {'titulo': titulo_categoria,
      'email': UserEmail
      },
      //Cambiar a type: POST si necesario
      type: "POST",
      dataType: "json",
      // URL a la que se enviará la solicitud Ajax
      url: "http://localhost/appweb/public/HomePage/guardar_categoria",
      success : function(categoria_nueva){
        nueva_categoria = ''
        nueva_categoria = '<button class="accordion" id="' + titulo_categoria + '-button">' + titulo_categoria + '</button>' + '<div class="panel" id="'+ categoria_nueva+'"></div>'
        $('#lista_categorias').append(nueva_categoria);
      acc = document.getElementById(titulo_categoria + "-button");
      acc.addEventListener("click", function() {
      /* Toggle between adding and removing the "active" class,
      to highlight the button that controls the panel */
      this.classList.toggle("active");
  
      /* Toggle between hiding and showing the active panel */
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
        listaCategoriasUsuario.push('<option value="'+ categoria_nueva +'">' + titulo_categoria + '</option>')
      },
      error : function(xhr){
        console.log(xhr)
      }
    })
  }
}

function mostrar_categorias(){
  $.ajax({
    // En data puedes utilizar un objeto JSON, un array o un query string
    data: {'email': UserEmail},
    //Cambiar a type: POST si necesario
    type: "POST",
    dataType: "json",
    // URL a la que se enviará la solicitud Ajax
    url: "http://localhost/appweb/public/HomePage/listar_categorias_usuario",
    success : function(a){
      a.forEach(element => {
        nueva_categoria = ''
        nueva_categoria = '<button class="accordion" id="' + element.titulo + '-button">' + element.titulo + '</button>' + '<div class="panel" id="' + element.id + '"></div>'
        $('#lista_categorias').append(nueva_categoria);
        acc = document.getElementsByClassName("accordion");
        acc[acc.length-1].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");
        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
          if (panel.style.display === "block") {
            panel.style.display = "none";
          } else {
            panel.style.display = "block";
          }
        });
        console.log(element.id)
        $.ajax({
          data: {'id_categoria': element.id},
          type: "POST",
          dataType: "json",
          url: "http://localhost/appweb/public/HomePage/listar_videos_categoria",
          success : function(listaVideos){
            console.log(listaVideos)
            listaVideos.forEach(videos =>{
              $('#'+element.id).append('<iframe src="https://www.youtube.com//embed/'+ videos.id_video+'"></iframe>')
            })
          },
          error : function(hrx){
            console.log(hrx)
          }
        })
        listaCategoriasUsuario.push('<option value="'+ element.id +'">' + element.titulo + '</option>')
      });
    }
  })
  

}

function mostrar_nombre_usuario(){
  $('#seccion_cabecera_usuario').append('<h2><a id="link_nombre_usuario" href="http://localhost/appweb/public/User/mostrar_perfil">'+UserEmail+'</h2>')
}

function displayResult(item){
    var videoId = item.id.videoId;
    var linkVideo = 'https://www.youtube.com//embed/'+ videoId
    var cuadro_video = ''
    cuadro_video = cuadro_video + '<div class="cuadro_video">' + '<iframe src="' + linkVideo + '"></iframe>' + '<select id="' + videoId + '" onchange="agregar_video_categoria(id,value);"><option>Seleccione la categoria</option></select></div>'
    $('#example').append(cuadro_video);
    listaCategoriasUsuario.forEach(categorias=>{
      $('#'+videoId).append(categorias)
    })
  }

function agregar_video_categoria(idVideo, id_categoria){
  var linkVideoCategoria = 'https://www.youtube.com//embed/'+ idVideo
  $('#'+id_categoria).append('<iframe src="' + linkVideoCategoria + '"></iframe>')
  $.ajax({
    // En data puedes utilizar un objeto JSON, un array o un query string
    data: {'idVideo': idVideo,
    'idCategoria' : id_categoria,
    'termino_busqueda' : q
  },
    //Cambiar a type: POST si necesario
    type: "POST",
    dataType: "json",
    // URL a la que se enviará la solicitud Ajax
    url: "http://localhost/appweb/public/HomePage/guardarVideo",
  })
}


for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}