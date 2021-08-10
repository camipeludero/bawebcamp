<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
       <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">Hola: <?php echo $_SESSION['nombre'] ?>
                          </button>
                          <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="editar-admin.php?id=<?php echo $_SESSION['id_admin'] ?>">Editar cuenta</a>
                            <a class="dropdown-item" href="login.php?cerrar_sesion=true">Cerrar sesion</a>
                          </div>
                        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->