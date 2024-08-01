<?php include_once 'layoutInterno.php';
      include_once '../Controller/productoController.php';
      include_once '../Controller/categoriaController.php'; 

      $datos = ConsultarProducto($_GET["q"]);
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
                        <h1 class="m-0 text-dark">Datos del producto</h1>
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

                                <form action="" method="post" enctype="multipart/form-data">

                                <input id="txtIdProducto" name="txtIdProducto" type="hidden" value="<?php echo $datos["IdProducto"] ?>">

                                    <Label>Nombre</Label>
                                    <div class="input-group mb-3">
                                        <input id="txtNombre" name="txtNombre" type="text"
                                            class="form-control" placeholder="Nombre" required value="<?php echo $datos["Nombre"] ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-tag"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <Label>Precio</Label>
                                    <div class="input-group mb-3">
                                        <input id="txtPrecio" name="txtPrecio" type="text" class="form-control"
                                            placeholder="Precio" required value="<?php echo $datos["Precio"] ?>" onkeypress="return SoloMontos(event, this)">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-credit-card"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <Label>Cantidad</Label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="txtCantidad" name="txtCantidad" class="form-control"
                                            placeholder="Cantidad" required value="<?php echo $datos["Cantidad"] ?>" onkeypress="return SoloNumeros(event)">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-inbox"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <Label>Categoría</Label>
                                    <div class="input-group mb-3">
                                        <select id="selectCategoria" name="selectCategoria" class="form-control" required>
                                            <?php ConsultarCategoriasEditar($datos["IdCategoria"]) ?>
                                        </select>
                                    </div>

                                    <Label>Imagen Actual</Label>
                                    <div class="input-group input-group-outline mb-3">
                                        <img width='200' height='150' src="<?php echo $datos["Imagen"] ?>"></img>
                                    </div>

                                    <Label>Imagen</Label>
                                    <div class="input-group input-group-outline mb-3">
                                        <input id="txtImagen" name="txtImagen" type="file" class="form-control"
                                            placeholder="Imagen" value="" accept="image/png, image/jpg, image/jpeg">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-camera"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-9">

                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <button type="submit" id="btnActualizarProducto" name="btnActualizarProducto"
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
    <script src="dist/js/productos.js"></script>
</body>

</html>