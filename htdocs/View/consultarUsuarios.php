<?php   include_once 'layoutInterno.php';
        include_once '../Controller/usuarioController.php';
      
        ValidarRolAdministrador();
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
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="m-0 text-dark">Consulta de usuarios</h1>
                                <br/>

                                <?php
                                    if(isset($_POST["msj"]))
                                    {
                                        echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
                                    }
                                ?>

                                <table id="tablaUsuarios" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Identificación</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Estado</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            ConsultarUsuarios();
                                        ?>
                                    </tbody>
                                </table>


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

    <div class="modal fade" id="ModalUsuarios" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:600px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="txtConsecutivo" name="txtConsecutivo">
                        ¿Desea cambiar el estado del usuario <label id="lblNombre"></label> ?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnCambiarEstadoUsuario"
                            name="btnCambiarEstadoUsuario">Procesar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php 
        HeadJS();
    ?>
    <script>
        $(document).on("click", ".AbrirModal", function() {
            $("#lblNombre").text($(this).attr('data-name'));
            $("#txtConsecutivo").val($(this).attr('data-id'));
        });

        $(document).ready(function(){
            $("#tablaUsuarios").DataTable({
                language : {
                    url: 'dist/language.json'
                },
                columnDefs:  [{ type: 'string', target: [0]}]
            });
        });
    </script>    
</body>
</html>