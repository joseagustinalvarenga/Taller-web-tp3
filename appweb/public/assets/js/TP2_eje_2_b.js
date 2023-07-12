function cambiar_imagen() {
    var src1 = "img/3dimagen.png";
    var src2 = "img/welcome_videotrend.png";
    var imagen = $("#imagen-banner img");
  
    if (imagen.attr("src") == src1) {
      imagen.slideUp(function() {
        imagen.attr("src", src2);
        imagen.slideDown();
      });
    } else {
      imagen.slideUp(function() {
        imagen.attr("src", src1);
        imagen.slideDown();
      });
    }
  }
  