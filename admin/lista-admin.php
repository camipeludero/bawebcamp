<?php
include_once 'funciones/sesiones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
 ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Administradores</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      try {
                          include_once 'funciones/funciones.php';
                          $sql = "SELECT id_admin, usuario, nombre FROM admins";
                          $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                          $error = $e->getMessage();
                          echo $error;
                      }
                      while ($admin = $resultado->fetch_assoc()) { ?>
                        <tr>
                        <td>
                        <?php echo $admin['usuario']; ?></td>
                        <td>
                        <?php echo $admin['nombre']; ?></td>
                        <td><a href="editar-admin.php?id=<?php echo $admin['id_admin'] ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pen" style="color: white;"></i></a>
                      <a href="" data-id="<?php echo $admin['id_admin']; ?>" data-type="admin" class="btn btn-danger btn-flat margin borrar_registro"><i class="fa fa-trash"></i></a></td>
                        </tr>

                      <?php } //end while?>
                                          
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'templates/footer.php'; ?>