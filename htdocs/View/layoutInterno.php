<?php
    include_once '../Controller/usuarioController.php'; 
    include_once '../Controller/carritoController.php'; 
      
    ConsultarResumenCarrito();

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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">'; 
                
                if($_SESSION["RolUsuario"] == 2) 
                {
                    echo '<li class="nav-item has-treeview">
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

                                <li class="nav-item">
                                    <a href="consultarProductos.php" class="nav-link">
                                        <i class="fa fa-tag nav-icon"></i>
                                        <p>Productos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                Reportes
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Ventas</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Cientes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        ';
                    }
                    else
                    {

                        echo '<li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Mi Carrito
                            </p>
                        </a>    
                    </li>
                    
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Mis Compras
                            </p>
                        </a>
                    </li>
                    ';

                    }

            echo '</ul>
            </nav>
        </div>
        </aside>
        ';
    }

    function MostrarNav()
    {
        if(!isset($_SESSION["NombreUsuario"]))
        {
           header("location: login.php");
        }

        echo '
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>
        
            <form class="form-inline ml-3"><i class="fa fa-tags"></i> &nbsp;&nbsp;' . $_SESSION["Cantidad"] . 
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-credit-card"></i> &nbsp;&nbsp;' . $_SESSION["SubTotal"] . ' + IVA</form>           
        
            <ul class="navbar-nav ml-auto">
            <div class="form-inline ml-3">' . $_SESSION["NombreUsuario"] . '</div>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="actualizarPerfil.php" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a href="actualizarContrasenna.php" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Seguridad
                </a>
                <div class="dropdown-divider"></div>

                <form action="" method="POST">
                    <button id="btnCerrarSesion" name="btnCerrarSesion" type="submit" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> Salir
                    </button>
                </form>

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
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css">
            </head>
        ';
    }

    function HeadJS()
    {
        echo '
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="dist/js/adminlte.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
        ';
    }

    function ValidarRolAdministrador()
    {
        if($_SESSION["RolUsuario"] != 2)
        {
            header("location: home.php");
        } 
    }

?>