<?php include_once 'layoutInterno.php';
      include_once '../Controller/usuarioController.php'; 
?>

<!DOCTYPE html>
<html>

<?php 
    HeadCSS();
?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a>Sistema Web</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicio de Sesión</p>

                <?php
                    if(isset($_POST["msj"]))
                    {
                        echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
                    }
                ?>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" id="txtEmail" name="txtEmail" class="form-control" 
                            placeholder="Correo Electrónico" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="txtPassword" name="txtPassword" class="form-control" 
                            placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">

                        </div>
                        <div class="col-5">
                            <button type="submit" id="btnIniciarSesion" name="btnIniciarSesion" 
                                class="btn btn-primary btn-block">Procesar</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="recuperar.php">Olvidaste tu contraseña?</a>
                </p>
                <p class="mb-0">
                    <a href="registro.php" class="text-center">Aún no tienes una cuenta?</a>
                </p>

            </div>
        </div>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>