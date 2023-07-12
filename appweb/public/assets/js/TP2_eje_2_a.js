function enviar() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
  
    $.ajax({
      type: "POST",
      url: "https://jsonplaceholder.typicode.com/posts", // URL de prueba
      data: { email: email, password: password },
      success: function(response) {
        console.log(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  }