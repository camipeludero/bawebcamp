<?php include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php'; 
include_once 'funciones/funciones.php';?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Administrador</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->

      <div class="card">
        <div class="card-header">
        <div class="card-body">
          <!--form-->
              <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                <div class="row">
                  <div class="col-md-8">
                <div class="card-body" d-flex flex-row justify-content-center alig-items-center>
                  <div class="form-group row">
                    <label for="input-nombre" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input-usuario" class="col-sm-3 col-form-label">Usuario</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="input-usuario" name="usuario" placeholder="Usuario">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Repetir Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Contraseña">
                      <span id="resultado_password"  class="help-block"></span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <input type="hidden" name="registro" value="nuevo"/>
                  <button type="submit" class="btn btn-info" id="crear_registro">Agregar</button>
                </div>
                </div>
                </div>
              </form>
        
          <!--end form-->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'templates/footer.php'; ?>