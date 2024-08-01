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
        $IdProducto = $_POST["IdProducto"];
        $Nombre = $_POST["txtNombre"];
        $Precio = $_POST["txtPrecio"];
        $Cantidad = $_POST["txtCantidad"];
        $Categoria = $_POST["selectCategoria"];
        $Imagen = '/View/Images/' . $_FILES["txtImagen"]["name"];
    }

?>