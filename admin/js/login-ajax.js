$(document).ready(function () {
  //login admin
  $("#login-admin").on("submit", function (e) {
    e.preventDefault();

    var datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr("method"),
      data: datos,
      url: $(this).attr("action"),
      dataType: "json",
      success: function (data) {
        var resultado = data;
        if (resultado.respuesta == "exito") {
          Swal.fire({
            icon: "success",
            title: "Hola " + resultado.usuario + " !",
            text: "Has iniciado sesión correctamente",
          });
          setTimeout(function () {
            window.location.href = "admin-area.php";
          }, 1000);
        } else if (resultado.respuesta == "password-incorrecto") {
          Swal.fire({
            icon: "error",
            title: "Error!",
            text: "La contraseña ingresada es incorrecta",
          });
        } else if (resultado.respuesta == "no-existe") {
          Swal.fire({
            icon: "error",
            title: "Error!",
            text: "El usuario ingresado es incorrecto",
          });
        }
      },
    });
  });
});
