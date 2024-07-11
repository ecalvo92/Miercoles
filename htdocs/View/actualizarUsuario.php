<?php include_once 'layoutInterno.php';
      include_once '../Controller/usuarioController.php'; 
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

                <?php
                    if(isset($_POST["msj"]))
                    {
                        echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
                    }
                ?>

            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2024 </strong>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script>
        $(document).on("click",".AbrirModal", function(){
            $("#lblNombre").text($(this).attr('data-name'));
            $("#txtConsecutivo").val($(this).attr('data-id'));
        });
    </script>
</body>

</html>