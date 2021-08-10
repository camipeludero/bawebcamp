$(document).ready(function (){
        $("#registros").DataTable({
          "paging": true,
          "pageLength": 10,
          "lengthChange": false, 
          "searching": true,
          "ordering": true,
          "autoWidth": false,
          "language": {
            paginate: {
              next: "Siguiente",
              previous: "Anterior",
              last: "Ultimo",
              first: "Primero"
            },
            search: "Buscar",
            empty: "No hay registros",
            infoEmpty: "0 registros",
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados'
          },
          "responsive": true, 
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#registros_wrapper .col-md-6:eq(0)');
});

$('#crear_registro').attr('disabled', true);

$('#repetir_password').on('input', function() {
  var password_nuevo = $('#password').val();
  if($(this).val() == password_nuevo) {
    $('#resultado_password').text('Correcto').addClass('text-success').removeClass('text-danger');
    $('#repetir_password').addClass('is-valid').removeClass('is-invalid');
    $('input#password').addClass('is-valid').removeClass('is-invalid');
    $('#crear_registro').attr('disabled', false);

  } else{
    $('#resultado_password').text('Las contraseñas no coinciden').addClass('text-danger').removeClass('text-success');
    $('#repetir_password').addClass('is-invalid').removeClass('is-valid');
    $('input#password').addClass('is-invalid').removeClass('is-valid');
  }
});