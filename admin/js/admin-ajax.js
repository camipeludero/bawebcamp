$(document).ready(function () {
  //crear y editar admin
  $("#guardar-registro").on("submit", function (e) {
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
          //console.log(data);
          Swal.fire({
            icon: "success",
            title: "Correcto",
            text: "Se guardaron los cambios",
          });
          setTimeout(function () {
            window.location.href = "lista-admin.php";
          }, 1000);
        } else {
          Swal.fire({
            icon: "error",
            title: "Error!",
            text: "Intentalo nuevamente",
          });
        }
      },
    });
  });

  //Eliminar registro

  $(".borrar_registro").on("click", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var tipo = $(this).attr("data-type");
    Swal.fire({
      title: "De verdad quieres borrar esta cuenta?",
      text: "No podrás recuperar esta informacion!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, eliminar!",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "post",
          data: {
            id: id,
            registro: "eliminar",
          },
          url: "modelo-" + tipo + ".php",
          success: function (data) {
            var resultado = JSON.parse(data);
            if (resultado.respuesta == "exito") {
              jQuery('[data-id="' + resultado.id_eliminado + '"]')
                .parents("tr")
                .remove();

              Swal.fire("Eliminado!", "Se ha eliminado la cuenta.", "success");
            } else {
              Swal.fire(
                "Error!",
                "Hubo un error al eliminar la cuenta.",
                "error"
              );
            }
          },
        });
      }
    });
  });
});
