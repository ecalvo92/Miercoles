<?php   include_once 'layoutInterno.php';
        include_once '../Controller/productoController.php';
      
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
                                <h1 class="m-0 text-dark">Consulta de productos</h1>
                                <br/>

                                <?php
                                    if(isset($_POST["msj"]))
                                    {
                                        echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
                                    }
                                ?>

                                <div>
                                    <a class="btn btn-primary" href="registrarProductos.php">
                                        <i class="fa fa-plus" style="margin-right:5px"> </i>Registrar
                                    </a>
                                </div>
                                <br/>

                                <table id="tablaProductos" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Categoría</th>
                                            <th>Imagen</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            ConsultarProductos();
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

    <?php 
        HeadJS();
    ?>
    <script>
        $(document).ready(function(){
            $("#tablaProductos").DataTable({
                language : {
                    url: 'dist/language.json'
                },
                columnDefs:  [{ type: 'string', target: [0,1,2,3,4,5]}]
            });
        });
    </script>    
</body>
</html>