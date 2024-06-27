<?php include_once '../Controller/usuarioController.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a>Sistema Web</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Recuperar Acceso</p>

                <?php
                    if(isset($_POST["msj"]))
                    {
                        echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
                    }
                ?>

                <form action="" method="post">
                    <div class="input-group mb-3">
                    <input id="txtIdentificacion" name="txtIdentificacion" type="text" class="form-control"
                            placeholder="Identificación" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                           
                        </div>
                        <div class="col-5">
                        <button type="submit" id="btnRecuperarAcceso" name="btnRecuperarAcceso"
                        class="btn btn-primary btn-block">Procesar</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                <a href="login.php" class="text-center">Ya tienes una cuenta?</a>
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