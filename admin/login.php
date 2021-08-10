<?php 
session_start();
$cerrar_sesion = $_GET['cerrar_sesion'];
if($cerrar_sesion){
  session_destroy();
}
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
?>
<body class="hold-transition login-page">
  <div class="bg-img"></div>
<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>BA</b>WEBCAMP</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión</p>
      <form name="form-login-admin" id="login-admin" method="post" action="login-admin.php">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="hidden" name="login-admin" value="1"/>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
<?php include_once 'templates/footer.php'; ?>