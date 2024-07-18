<?php include_once 'layoutInterno.php';
      include_once '../Controller/usuarioController.php'; 
?>

<!DOCTYPE html>
<html>

<?php 
    HeadCSS();
?>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a>Sistema Web</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registro de Usuarios</p>

                <?php
                    if(isset($_POST["msj"]))
                    {
                        echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
                    }
                ?>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input id="txtIdentificacion" name="txtIdentificacion" type="text" class="form-control"
                            placeholder="Identificación" onkeyup="ConsultarNombre();" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="txtNombre" name="txtNombre" type="text" readOnly class="form-control"
                            placeholder="Nombre" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
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
                            <button type="submit" id="btnRegistrarUsuario" name="btnRegistrarUsuario" disabled
                                class="btn btn-primary btn-block">Procesar</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="recuperar.php">Olvidaste tu contraseña?</a>
                </p>
                <p class="mb-0">
                    <a href="login.php" class="text-center">Ya tienes una cuenta?</a>
                </p>

            </div>
        </div>
    </div>

    <?php 
        HeadJS();
    ?>
    <script src="dist/js/usuarios.js"></script>
</body>
</html>