<?php

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    function MostrarMenu()
    {
      echo '
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="home.php" class="brand-link">
            <img src="dist/img/AdminLTELogo.png"
                alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
    
        <div class="sidebar">
   
            <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Mantenimientos
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="consultarUsuarios.php" class="nav-link">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                </ul>
                </li>
            </ul>
            </nav>
        </div>
        </aside>
        ';
    }

    function MostrarNav()
    {
        echo '
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>
        
            <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </form>
        
            <ul class="navbar-nav ml-auto">
             <div class="form-inline ml-3">' . $_SESSION["NombreUsuario"] . '</div>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Seguridad
                </a>
                <div class="dropdown-divider"></div>

                <a onclick="CerrarSesion();" class="dropdown-item">
                     <i class="fas fa-file mr-2"></i> Salir
                </a>
            </li>
            </ul>
        </nav>
      ';
    }

    function HeadCSS()
    {
        echo '<head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Sistema Web</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                <link rel="stylesheet" href="dist/css/adminlte.min.css">
                <link rel="stylesheet" href="dist/css/styles.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
                <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
            </head>
        ';
    }

?>

<script>

function CerrarSesion()
{
    alert("HOLA");
}

</script>