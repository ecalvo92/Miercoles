<?php include_once '../Model/productoModel.php';
      include_once 'comunController.php';

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    function ConsultarProductos()
    {
        $respuesta = ConsultarProductosBD();

        if($respuesta -> num_rows > 0)
        {
            while ($row = mysqli_fetch_array($respuesta)) 
            { 
                echo "<tr>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["Precio"] . "</td>";
                echo "<td>" . $row["Cantidad"] . "</td>";
                echo "<td>" . $row["NombreCategoria"] . "</td>";
                echo "<td><img width='200' height='150' src=" . $row["Imagen"] . "></img></td>";
                echo '<td>
                        
                        <a href="actualizarProductos.php?q=' . $row["IdProducto"] . '" class="btn btn-primary">
                            <i class="fa fa-pen"></i>
                        </a>

                     </td>';
                echo "</tr>";
            }
        }
    }

    function ConsultarProductosParaComprar()
    {
        $respuesta = ConsultarProductosBD();

        if($respuesta -> num_rows > 0)
        {
            echo '<div class="row">';

            while ($row = mysqli_fetch_array($respuesta)) 
            { 
                echo '<div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                        <div style="text-align:center">
                            <img class="card-img-top" src="'. $row["Imagen"] .'" style="width:200px; height:150px; margin-top:20px">
                        </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><h5 class="card-title">'. $row["Nombre"] .'</h5></li>
                                    <li class="list-group-item">Categoría: '. $row["NombreCategoria"] .'</li>
                                      <li class="list-group-item">Inventario: '. $row["Cantidad"] .'</li>
                                       <li class="list-group-item">Precio: '. $row["Precio"] .'</li>
                                </ul>
                            </div>
                            <div class="card-body row">
                                <div class="col-1">
                                </div>
                                <div class="col-4">
                                    <input id=prd-'. $row["IdProducto"] .' type="number" class="form-control" style="text-align:center" 
                                    onkeypress="return SoloNumeros(event)" value="0" min="1" max='. $row["Cantidad"] .' />
                                </div>
                                <div class="col-6">
                                    <a class="card-link btn btn-outline-primary" 
                                    onclick="AnnadirProducto('. $row["IdProducto"] .', '. $row["Cantidad"] .');">Añadir al Carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>';
            }

            echo '</div>';
        }
    }

    if(isset($_POST["btnRegistrarProducto"]))
    {
        $Nombre = $_POST["txtNombre"];
        $Precio = $_POST["txtPrecio"];
        $Cantidad = $_POST["txtCantidad"];
        $Categoria = $_POST["selectCategoria"];
        $Imagen = '/View/Images/' . $_FILES["txtImagen"]["name"];

        $origen = $_FILES["txtImagen"]["tmp_name"];
        $destino = $_SERVER['DOCUMENT_ROOT'] . '/View/Images/' . $_FILES["txtImagen"]["name"];
        copy($origen,$destino);

        RegistrarProducto($Nombre,$Precio,$Cantidad,$Categoria,$Imagen);
        header("location: ../View/consultarProductos.php");
    }

    function ConsultarProducto($Consecutivo)
    {
        $respuesta = ConsultarProductoBD($Consecutivo);
        if($respuesta -> num_rows > 0)
        {
            return mysqli_fetch_array($respuesta);
        }
    }

    if(isset($_POST["btnActualizarProducto"]))
    {
        $IdProducto = $_POST["txtIdProducto"];
        $Nombre = $_POST["txtNombre"];
        $Precio = $_POST["txtPrecio"];
        $Cantidad = $_POST["txtCantidad"];
        $Categoria = $_POST["selectCategoria"];

        $Imagen = "";
        if($_FILES["txtImagen"]["name"] != "")
        {
            $Imagen = '/View/Images/' . $_FILES["txtImagen"]["name"];
        }       

        ActualizarProducto($IdProducto,$Nombre,$Precio,$Cantidad,$Categoria,$Imagen);
        header("location: ../View/consultarProductos.php");
    }

?>