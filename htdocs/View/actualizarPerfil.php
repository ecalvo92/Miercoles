<?php include_once 'layoutInterno.php';
      include_once '../Controller/usuarioController.php';
      include_once '../Controller/rolController.php'; 

      $datos = ConsultarUsuario($_SESSION["ConsecutivoUsuario"]);
?>

<!DOCTYPE html>
<html>

<?php 
    HeadCSS();
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php 
          MostrarNav();
          MostrarMenu();
        ?>

        <div class="content-wrapper">
            <section class="content">

                <div class="content-header">
                    <div class="container-fluid">
                        <h1 class="m-0 text-dark">Datos del perfil</h1>
                        <br />
                        <div class="row mb-2">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-8">

                                <?php
                                    if(isset($_POST["msj"]))
                                    {
                                        echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
                                    }
                                ?>

                                <form action="" method="post">

                                    <input id="txtConsecutivo" name="txtConsecutivo" type="hidden" value="<?php echo $datos["Consecutivo"] ?>">

                                    <Label>Identificación</Label>
                                    <div class="input-group mb-3">
                                        <input id="txtIdentificacion" name="txtIdentificacion" type="text"
                                            class="form-control" placeholder="Identificación"
                                            onkeyup="ConsultarNombre('btnActualizarUsuario');" required
                                            value="<?php echo $datos["Identificacion"] ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <Label>Nombre</Label>
                                    <div class="input-group mb-3">
                                        <input id="txtNombre" name="txtNombre" type="text" readOnly class="form-control"
                                            placeholder="Nombre" required value="<?php echo $datos["Nombre"] ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <Label>Correo Electrónico</Label>
                                    <div class="input-group mb-3">
                                        <input type="email" id="txtEmail" name="txtEmail" class="form-control"
                                            placeholder="Correo Electrónico" required
                                            value="<?php echo $datos["Correo"] ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <Label>Perfil</Label>
                                    <div class="input-group mb-3">
                                        <select disabled id="selectRol" name="selectRol" class="form-control" required>
                                            <?php ConsultarRoles($datos["IdRol"]); ?>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-9">

                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <button type="submit" id="btnActualizarPerfil" name="btnActualizarPerfil"
                                                class="btn btn-primary btn-block">Procesar</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2024 </strong>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <?php 
        HeadJS();
    ?>
    <script src="dist/js/usuarios.js"></script>
    <script>
    $(document).on("click", ".AbrirModal", function() {
        $("#lblNombre").text($(this).attr('data-name'));
        $("#txtConsecutivo").val($(this).attr('data-id'));
    });
    </script>
</body>

</html>