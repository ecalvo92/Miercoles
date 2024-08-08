<?php include_once 'layoutInterno.php';
      include_once '../Controller/productoController.php'; 
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
                                <br />

                                <?php
                                    ConsultarProductosParaComprar();
                                ?>

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
    <script src="dist/js/productos.js"></script>
</body>

</html>